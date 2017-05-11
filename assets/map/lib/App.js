/*
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
Ext.namespace("Ostim");

/** Define global variables, may be overridden. */
Ext.namespace("Ostim.globals");

/** REST Services specific to Ostim. */
Ostim.globals = {
    serviceUrl: '/cgi-bin/ostim.cgi',
    version: '1.0.2',
    imagePath: undefined
};

Ext.BLANK_IMAGE_URL = 'data:image/gif;base64,R0lGODlhAQABAID/AMDAwAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';

try {
    // Define here for now as this file is always included but we need a better way
    Proj4js.defs["EPSG:28992"] = "+proj=sterea +lat_0=52.15616055555555 +lon_0=5.38763888888889 +k=0.999908 +x_0=155000 +y_0=463000 +ellps=bessel +units=m +towgs84=565.2369,50.0087,465.658,-0.406857330322398,0.350732676542563,-1.8703473836068,4.0812 +no_defs";
    // Somehow Proj4JS tries to load this def, without success...
    Proj4js.defs["EPSG:25831"] = "+proj=utm +zone=31 +ellps=GRS80 +units=m +no_defs";
} catch (err) {
    // ignore
}

/** Registered applications for Ostim.app type main classes. */
try {
    // Only valid when GXP libs available
    Ext.reg('gxp_viewer', gxp.Viewer);
} catch (err) {
    // ignore
}

/** api: (define)
 *  module = Ostim
 *  class = App
 */

/** api: constructor
 *  .. class:: App()
 *
 *  The main entry of Ostim, all begins here. The entire application is created from the configuration ("Ostim.layout") file.
 *  Normally there is no need to override this class. See the Launcher.js how this class is used to autolaunch
 *  a Ostim app. This is the defeault behaviour.
 *
 * .. code-block:: javascript
 *
 *      // Creating and launching a Ostim app is a 2-step process
 *
 *      // Create the components from the Ostim.layout config
 *    Ostim.App.create();
 *
 *      // Make components visible
 *    Ostim.App.show();
 *
 */
Ext.namespace("Ostim.App");
Ostim.App = function () {

    return {
        create: function () {
            Ext.QuickTips.init();

            if (Ostim.app) {
                console.log('ostim.app if');
                // Application-specific config: create the app
                Ostim.App.createApp();
            } else if (Ostim.layout) {
                console.log('ostim.layout if');
                console.log(Ostim.layout);
                // If a Ostim.context URL was specified (mapContextUrl), load the context file first (async).
                // Then via the callback perform the rest of the initialization
                if (Ostim.layout.mapContextUrl) {
                    var mgr = Ostim.App.contextManager = new Ostim.data.OstimMapContext({name: Ostim.layout.mapContextUrl, async: true});
                    mgr.on('loaded', Ostim.App.onContextLoaded);
                    mgr.on('failure', Ostim.App.onContextFailure);
                    mgr.load();
                    return;
                }
                Ostim.App.createLayout();
            } else {
                alert('need Ostim.layout or Ostim.app configuration!')
            }
        },

        createApp: function () {
            // Create main app object via xtype, e.g. gxp.Viewer
            console.log('Creating Ostim App from xtype = ' + Ostim.app.xtype);
            Ostim.App.app = Ext.create(Ostim.app);
        },

        onContextFailure: function (msg) {
            console.log('Error loading context: ' + msg);
        },

        onContextLoaded: function (context) {
            // Save the context config so components can access
            Ostim.App.context = context;

            Ostim.App.createLayout();
        },

        createLayout: function () {
            console.log('Creating Ostim App from layout = ' + Ostim.layout.xtype);
            // Standard Ostim application with top Container widget
            if (Ostim.layout.renderTo || Ostim.layout.xtype == 'window') {
                console.log('Creating Ostim App from layout for window --->');
                // Render topComponent into a page div element or floating window
                Ostim.App.topComponent = Ext.create(Ostim.layout);
            } else {
                console.log('Creating Ostim App from layout for viewport ---> ');
                // Default: render top component into an ExtJS ViewPort (full screen)
                Ostim.App.topComponent = new Ext.Viewport({
                    id: "hr-topComponent",
                    layout: "fit",
                    hideBorders: true,

                    // This creates the entire layout from the config !
                    items: [Ostim.layout]
                });
            }

            if (Ostim.App.topComponent.isVisible() === false) {
                Ostim.App.topComponent.show();
            }
        },

        init: function () {
            Ostim.App.create();
            // Ostim.App.show();
        },

        show: function () {
            if (Ostim.App.topComponent && Ostim.App.topComponent.isVisible() === false) {
                Ostim.App.topComponent.show();
            }
        },

        getMapContext: function (contextName) {
            return Ostim.App.context;
        },

        getMap: function () {
            return Ostim.App.map;
        },

        setMap: function (aMap) {
            Ostim.App.map = aMap;
        },

        getMapPanel: function () {
            return Ostim.App.mapPanel;
        },

        setMapPanel: function (aMapPanel) {
            Ostim.App.mapPanel = aMapPanel;
        }
    };
}();
