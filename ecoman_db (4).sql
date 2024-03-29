

CREATE SEQUENCE t_clstr_seq;

CREATE TABLE IF NOT EXISTS t_clstr (
  id int NOT NULL DEFAULT NEXTVAL ('t_clstr_seq'),
  name varchar(200) NOT NULL,
  active smallint NOT NULL,
  org_ind_reg_id int NOT NULL,
  PRIMARY KEY (id)
)    ;
 
ALTER SEQUENCE t_clstr_seq RESTART WITH 7;

CREATE INDEX org_ind_reg_id ON t_clstr (org_ind_reg_id);

--
-- Dumping data for table 't_clstr'
--

INSERT INTO t_clstr (id, name, active, org_ind_reg_id) VALUES
(4, 'Medikal Kümesi', 1, 1),
(5, 'İş ve İnşaat Kümesi', 1, 2),
(6, 'Savunma ve Havacılık Kümesi', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table 't_cmpnnt'
--

CREATE SEQUENCE t_cmpnnt_seq;

CREATE TABLE IF NOT EXISTS t_cmpnnt (
  id int NOT NULL DEFAULT NEXTVAL ('t_cmpnnt_seq'),
  name varchar(200) NOT NULL,
  name_tr varchar(200) DEFAULT NULL,
  active smallint NOT NULL,
  PRIMARY KEY (id)
)   ;
 
ALTER SEQUENCE t_cmpnnt_seq RESTART WITH 1;

-- --------------------------------------------------------

--
-- Table structure for table 't_cmpny'
--

CREATE SEQUENCE t_cmpny_seq;

CREATE TABLE IF NOT EXISTS t_cmpny (
  id int NOT NULL DEFAULT NEXTVAL ('t_cmpny_seq'),
  name varchar(255) NOT NULL,
  phone_num_1 varchar(50) DEFAULT NULL,
  phone_num_2 varchar(50) DEFAULT NULL,
  fax_num varchar(50) DEFAULT NULL,
  address varchar(100) DEFAULT NULL,
  description varchar(200) DEFAULT NULL,
  email varchar(150) DEFAULT NULL,
  postal_code varchar(50) DEFAULT NULL,
  logo varchar(60) DEFAULT NULL,
  active smallint NOT NULL,
  latitude varchar(25) NOT NULL,
  longitude varchar(25) NOT NULL,
  PRIMARY KEY (id)
)    ;
 
ALTER SEQUENCE t_cmpny_seq RESTART WITH 9;

--
-- Dumping data for table 't_cmpny'
--

INSERT INTO t_cmpny (id, name, phone_num_1, phone_num_2, fax_num, address, description, email, postal_code, logo, active, latitude, longitude) VALUES
(7, 'Ostim A.Ş.', '90-312-385-50-90', '90-312-385-50-90', '90-312-354-58-98', 'Ostim Organize Sanayi Bölge Müdürlüğü 100. Yıl Bulvarı No: 101/A, 06370, Ostim / Ankara', 'Türkiye’nin en büyük, dünyanın ise sayılı küçük ve orta ölçekli sanayi üretim alanlarından biri olan Ostim “üretimde esnekliği” geniş makine parkının avantajlarıyla birleştirmiştir.', 'iletisim@ostim.com.tr', 'NULL', '7.jpg', 1, '39.97346964672723', '32.745373249053955'),
(8, 'Reddit', '1-222-111-11-11', '1-222-111-11-12', '1-222-111-11-10', 'San Francisco, Silicon Alley', 'Reddit Conde Nast Digital şirketine ait bir sosyal haber sitesidir.', 'contact@reddit.com', 'NULL', '8.jpg', 1, '44.08758502824516', '-107.578125');

-- --------------------------------------------------------

--
-- Table structure for table 't_cmpny_clstr'
--

CREATE TABLE IF NOT EXISTS t_cmpny_clstr (
  cmpny_id int NOT NULL,
  clstr_id int NOT NULL,
  PRIMARY KEY (cmpny_id,clstr_id)
) ;

CREATE INDEX clstr_id ON t_cmpny_clstr (clstr_id);
CREATE INDEX cmpny_id ON t_cmpny_clstr (cmpny_id);

--
-- Dumping data for table 't_cmpny_clstr'
--

INSERT INTO t_cmpny_clstr (cmpny_id, clstr_id) VALUES
(7, 4),
(7, 5),
(8, 6);

-- --------------------------------------------------------

--
-- Table structure for table 't_cmpny_data'
--

CREATE TABLE IF NOT EXISTS t_cmpny_data (
  cmpny_id int NOT NULL,
  description varchar(200) DEFAULT NULL,
  PRIMARY KEY (cmpny_id)
) ;

--
-- Dumping data for table 't_cmpny_data'
--

INSERT INTO t_cmpny_data (cmpny_id, description) VALUES
(7, 'Türkiye’nin en büyük, dünyanın ise sayılı küçük ve orta ölçekli sanayi üretim alanlarından biri olan Ostim “üretimde esnekliği” geniş makine parkının avantajlarıyla birleştirmiştir.'),
(8, 'Reddit Conde Nast Digital şirketine ait bir sosyal haber sitesidir.');

-- --------------------------------------------------------

--
-- Table structure for table 't_cmpny_eqpmnt'
--

CREATE SEQUENCE t_cmpny_eqpmnt_seq;

CREATE TABLE IF NOT EXISTS t_cmpny_eqpmnt (
  id int NOT NULL DEFAULT NEXTVAL ('t_cmpny_eqpmnt_seq'),
  cmpny_id int DEFAULT NULL,
  eqpmnt_id int DEFAULT NULL,
  eqpmnt_type_id int DEFAULT NULL,
  eqpmnt_type_attrbt_id int DEFAULT NULL,
  PRIMARY KEY (id)
)    ;
 
ALTER SEQUENCE t_cmpny_eqpmnt_seq RESTART WITH 19;

CREATE INDEX cmpny_id ON t_cmpny_eqpmnt (cmpny_id);
CREATE INDEX eqpmnt_id ON t_cmpny_eqpmnt (eqpmnt_id);
CREATE INDEX eqpmnt_type_id ON t_cmpny_eqpmnt (eqpmnt_type_id);
CREATE INDEX eqpmnt_type_attrbt_id ON t_cmpny_eqpmnt (eqpmnt_type_attrbt_id);

--
-- Dumping data for table 't_cmpny_eqpmnt'
--

INSERT INTO t_cmpny_eqpmnt (id, cmpny_id, eqpmnt_id, eqpmnt_type_id, eqpmnt_type_attrbt_id) VALUES
(15, 7, 1, 1, 1),
(16, 7, 1, 1, 1),
(18, 7, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table 't_cmpny_flow'
--

CREATE SEQUENCE t_cmpny_flow_seq;

CREATE TABLE IF NOT EXISTS t_cmpny_flow (
  id int NOT NULL DEFAULT NEXTVAL ('t_cmpny_flow_seq'),
  cmpny_id int DEFAULT NULL,
  flow_id int NOT NULL,
  qntty decimal(10,2) DEFAULT NULL,
  qntty_unit_id int DEFAULT NULL,
  cost decimal(10,2) DEFAULT NULL,
  cost_unit_id int DEFAULT NULL,
  ep decimal(10,2) DEFAULT NULL,
  ep_unit_id int DEFAULT NULL,
  flow_type_id int DEFAULT NULL,
  PRIMARY KEY (id)
)    ;
 
ALTER SEQUENCE t_cmpny_flow_seq RESTART WITH 10;

CREATE INDEX cmpny_id ON t_cmpny_flow (cmpny_id);
CREATE INDEX flow_type_id ON t_cmpny_flow (flow_type_id);
CREATE INDEX flow_id ON t_cmpny_flow (flow_id);
CREATE INDEX qntty_unit_id ON t_cmpny_flow (qntty_unit_id);
CREATE INDEX cost_unit_id ON t_cmpny_flow (cost_unit_id);
CREATE INDEX ep_unit_id ON t_cmpny_flow (ep_unit_id);

--
-- Dumping data for table 't_cmpny_flow'
--

INSERT INTO t_cmpny_flow (id, cmpny_id, flow_id, qntty, qntty_unit_id, cost, cost_unit_id, ep, ep_unit_id, flow_type_id) VALUES
(5, 7, 2, '1000.00', 10, '1000.00', 10, '12.00', 2, 2),
(7, 7, 2, '112.00', 4, '121.00', 2, '121.00', 3, 1),
(8, 7, 1, '202.00', 3, '2020.00', 3, '202.00', 2, 1),
(9, 7, 3, '1231.00', 7, '1312.00', 7, '1231.00', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table 't_cmpny_flow_cmpnnt'
--

CREATE TABLE IF NOT EXISTS t_cmpny_flow_cmpnnt (
  cmpny_flow_id int NOT NULL,
  cmpnnt_id int NOT NULL,
  PRIMARY KEY (cmpny_flow_id,cmpnnt_id)
) ;

CREATE INDEX cmpnnt_id ON t_cmpny_flow_cmpnnt (cmpnnt_id);
CREATE INDEX cmpny_flow_id ON t_cmpny_flow_cmpnnt (cmpny_flow_id);

-- --------------------------------------------------------

--
-- Table structure for table 't_cmpny_flow_prcss'
--

CREATE TABLE IF NOT EXISTS t_cmpny_flow_prcss (
  cmpny_flow_id int NOT NULL,
  cmpny_prcss_id int NOT NULL,
  PRIMARY KEY (cmpny_flow_id,cmpny_prcss_id)
) ;

CREATE INDEX cmpny_flow_id ON t_cmpny_flow_prcss (cmpny_flow_id);
CREATE INDEX cmpny_prcss_id ON t_cmpny_flow_prcss (cmpny_prcss_id);

--
-- Dumping data for table 't_cmpny_flow_prcss'
--

INSERT INTO t_cmpny_flow_prcss (cmpny_flow_id, cmpny_prcss_id) VALUES
(5, 18),
(5, 19),
(5, 20),
(5, 21),
(8, 20),
(8, 21),
(9, 18),
(9, 22);

-- --------------------------------------------------------

--
-- Table structure for table 't_cmpny_nace_code'
--

CREATE TABLE IF NOT EXISTS t_cmpny_nace_code (
  cmpny_id int NOT NULL,
  nace_code_id int NOT NULL,
  PRIMARY KEY (cmpny_id,nace_code_id)
) ;

CREATE INDEX cmpny_id ON t_cmpny_nace_code (cmpny_id);
CREATE INDEX nace_code_id ON t_cmpny_nace_code (nace_code_id);

--
-- Dumping data for table 't_cmpny_nace_code'
--

INSERT INTO t_cmpny_nace_code (cmpny_id, nace_code_id) VALUES
(7, 91),
(8, 123);

-- --------------------------------------------------------

--
-- Table structure for table 't_cmpny_org_ind_reg'
--

CREATE TABLE IF NOT EXISTS t_cmpny_org_ind_reg (
  org_ind_reg_id int NOT NULL,
  cmpny_id int NOT NULL,
  PRIMARY KEY (org_ind_reg_id,cmpny_id)
) ;

CREATE INDEX cmpny_id ON t_cmpny_org_ind_reg (cmpny_id);
CREATE INDEX org_ind_reg_id ON t_cmpny_org_ind_reg (org_ind_reg_id);

-- --------------------------------------------------------

--
-- Table structure for table 't_cmpny_prcss'
--

CREATE SEQUENCE t_cmpny_prcss_seq;

CREATE TABLE IF NOT EXISTS t_cmpny_prcss (
  id int NOT NULL DEFAULT NEXTVAL ('t_cmpny_prcss_seq'),
  cmpny_id int DEFAULT NULL,
  prcss_id int NOT NULL,
  PRIMARY KEY (id)
)    ;
 
ALTER SEQUENCE t_cmpny_prcss_seq RESTART WITH 23;

CREATE INDEX cmpny_id ON t_cmpny_prcss (cmpny_id);
CREATE INDEX prcss_id ON t_cmpny_prcss (prcss_id);

--
-- Dumping data for table 't_cmpny_prcss'
--

INSERT INTO t_cmpny_prcss (id, cmpny_id, prcss_id) VALUES
(18, 7, 74),
(19, 7, 1),
(20, 7, 58),
(21, 7, 79),
(22, 7, 86);

-- --------------------------------------------------------

--
-- Table structure for table 't_cmpny_prcss_eqpmnt_type'
--

CREATE TABLE IF NOT EXISTS t_cmpny_prcss_eqpmnt_type (
  cmpny_eqpmnt_type_id int NOT NULL,
  cmpny_prcss_id int NOT NULL,
  PRIMARY KEY (cmpny_eqpmnt_type_id,cmpny_prcss_id)
) ;

CREATE INDEX cmpny_eqpmnt_type_id ON t_cmpny_prcss_eqpmnt_type (cmpny_eqpmnt_type_id);
CREATE INDEX cmpny_prcss_id ON t_cmpny_prcss_eqpmnt_type (cmpny_prcss_id);

-- --------------------------------------------------------

--
-- Table structure for table 't_cmpny_prsnl'
--

CREATE TABLE IF NOT EXISTS t_cmpny_prsnl (
  user_id int NOT NULL,
  cmpny_id int NOT NULL,
  is_contact smallint NOT NULL,
  PRIMARY KEY (user_id,cmpny_id)
) ;

CREATE INDEX cmpny_id ON t_cmpny_prsnl (cmpny_id);
CREATE INDEX user_id ON t_cmpny_prsnl (user_id);

--
-- Dumping data for table 't_cmpny_prsnl'
--

INSERT INTO t_cmpny_prsnl (user_id, cmpny_id, is_contact) VALUES
(1, 7, 1),
(2, 8, 1),
(3, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table 't_cnsltnt'
--

CREATE TABLE IF NOT EXISTS t_cnsltnt (
  user_id int NOT NULL,
  description varchar(200) DEFAULT NULL,
  active smallint NOT NULL,
  PRIMARY KEY (user_id)
) ;

--
-- Dumping data for table 't_cnsltnt'
--

INSERT INTO t_cnsltnt (user_id, description, active) VALUES
(1, 'desc', 1),
(2, 'burakdikili', 1),
(3, 'etolan', 1);

-- --------------------------------------------------------

--
-- Table structure for table 't_cp_allocation'
--

CREATE SEQUENCE t_cp_allocation_seq;

CREATE TABLE IF NOT EXISTS t_cp_allocation (
  id int NOT NULL DEFAULT NEXTVAL ('t_cp_allocation_seq'),
  prcss_id int DEFAULT NULL,
  flow_id int DEFAULT NULL,
  flow_type_id int DEFAULT NULL,
  amount double precision DEFAULT NULL,
  unit_amount varchar(25) NOT NULL,
  allocation_amount varchar(250) DEFAULT NULL,
  importance_amount varchar(250) DEFAULT NULL,
  cost double precision DEFAULT NULL,
  unit_cost varchar(25) NOT NULL,
  allocation_cost varchar(250) DEFAULT NULL,
  importance_cost varchar(250) DEFAULT NULL,
  env_impact double precision DEFAULT NULL,
  unit_env_impact varchar(25) NOT NULL,
  allocation_env_impact varchar(250) DEFAULT NULL,
  importance_env_impact varchar(250) DEFAULT NULL,
  reference int NOT NULL,
  unit_reference varchar(25) NOT NULL,
  kpi double precision NOT NULL,
  unit_kpi varchar(25) NOT NULL,
  kpi_error int NOT NULL,
  PRIMARY KEY (id)
)    ;
 
ALTER SEQUENCE t_cp_allocation_seq RESTART WITH 15;

CREATE INDEX flow_id ON t_cp_allocation (flow_id);
CREATE INDEX flow_type_id ON t_cp_allocation (flow_type_id);
CREATE INDEX t_cp_scoping_ibfk_1 ON t_cp_allocation (prcss_id);

--
-- Dumping data for table 't_cp_allocation'
--

INSERT INTO t_cp_allocation (id, prcss_id, flow_id, flow_type_id, amount, unit_amount, allocation_amount, importance_amount, cost, unit_cost, allocation_cost, importance_cost, env_impact, unit_env_impact, allocation_env_impact, importance_env_impact, reference, unit_reference, kpi, unit_kpi, kpi_error) VALUES
(1, 20, 1, 1, 1.50, 'Liter', '40', 'High', 210.00, 'Dolar', '40', 'Low', 3000.00, 'EP', '20', 'Medium', 0, '', 0, '', 0),
(2, 21, 1, 2, 1.50, 'KW', '40', 'High', 210.00, 'Dolar', '40', 'Low', 3000.00, 'EP', '20', 'Medium', 0, '', 0, '', 0),
(3, 21, 2, 1, 2.60, 'KW', '40', 'High', 1000.00, 'Dolar', '40', 'Low', 3000.00, 'EP', '20', 'Medium', 0, '', 0, '', 0),
(4, 18, 2, 1, 1.50, 'KW', '40', 'Medium', 210.00, 'Dolar', '40', 'Low', 3000.00, 'EP', '20', 'High', 0, '', 0, '', 0),
(5, 20, 1, 1, 1.50, 'Liter', '40', 'Medium', 210.00, 'Dolar', '40', 'Low', 3000.00, 'EP', '20', 'High', 0, '', 0, '', 0),
(6, 20, 2, 2, 1.58, 'KW', '40', 'Medium', 21012.00, 'Dolar', '10', 'Medium', 3006.00, 'EP', '28', 'High', 0, '', 0, '', 0),
(7, 20, 2, 1, 1.58, 'KW', '40', 'Medium', 21012.00, 'Dolar', '10', 'Medium', 3076.00, 'EP', '28', 'High', 0, '', 0, '', 0),
(8, 18, 3, 2, 1.50, 'm³', '40', 'Medium', 21012.00, 'Dolar', '40', 'High', 3206.00, 'EP', '20', 'High', 0, '', 0, '', 0),
(9, 21, 1, 1, 1.50, 'Liter', '40', 'Medium', 21012.00, 'Dolar', '40', 'High', 4006.00, 'EP', '20', 'High', 0, '', 0, '', 0),
(10, 21, 2, 1, 1.59, 'Liter', '40', 'Medium', 21012.00, 'Dolar', '40', 'High', 3016.00, 'EP', '20', 'High', 0, '', 0, '', 0),
(11, 21, 2, 2, 3.56, 'Liter', '40', 'Medium', 5000.00, 'Dolar', '40', 'High', 1206.00, 'EP', '20', 'High', 0, '', 0, '', 0),
(12, 22, 3, 1, 89.12, 'm³', '10', 'Medium', 245.00, 'Euro', '28', 'High', 3231.00, 'EP', '20', 'Medium', 0, '', 0, '', 0),
(13, 18, 3, 2, 12.10, 'm³', '10', 'Medium', 120007.00, 'TL', '28', 'High', 5000.00, 'EP', '20', 'Medium', 0, '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table 't_cp_company_project'
--

CREATE SEQUENCE t_cp_company_project_seq;

CREATE TABLE IF NOT EXISTS t_cp_company_project (
  id int NOT NULL DEFAULT NEXTVAL ('t_cp_company_project_seq'),
  allocation_id int DEFAULT NULL,
  prjct_id int DEFAULT NULL,
  cmpny_id int DEFAULT NULL,
  PRIMARY KEY (id)
)    ;
 
ALTER SEQUENCE t_cp_company_project_seq RESTART WITH 15;

CREATE INDEX allocation_id ON t_cp_company_project (allocation_id);
CREATE INDEX prjct_id ON t_cp_company_project (prjct_id);
CREATE INDEX cmpny_id ON t_cp_company_project (cmpny_id);

--
-- Dumping data for table 't_cp_company_project'
--

INSERT INTO t_cp_company_project (id, allocation_id, prjct_id, cmpny_id) VALUES
(1, 1, 2, 7),
(2, 2, 2, 7),
(3, 3, 2, 7),
(4, 4, 3, 7),
(5, 5, 3, 7),
(6, 6, 2, 7),
(7, 7, 2, 7),
(8, 8, 3, 7),
(9, 9, 3, 7),
(10, 10, 3, 7),
(11, 11, 3, 7),
(12, 12, 2, 7),
(13, 13, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table 't_cp_is_candidate'
--

CREATE SEQUENCE t_cp_is_candidate_seq;

CREATE TABLE IF NOT EXISTS t_cp_is_candidate (
  id int NOT NULL DEFAULT NEXTVAL ('t_cp_is_candidate_seq'),
  allocation_id int DEFAULT NULL,
  active smallint DEFAULT NULL,
  PRIMARY KEY (id)
)    ;
 
ALTER SEQUENCE t_cp_is_candidate_seq RESTART WITH 17;

CREATE INDEX allocation_id ON t_cp_is_candidate (allocation_id);

--
-- Dumping data for table 't_cp_is_candidate'
--

INSERT INTO t_cp_is_candidate (id, allocation_id, active) VALUES
(11, 1, 1),
(12, 13, 0),
(13, 3, 0),
(14, 12, 1),
(15, 2, 1),
(16, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table 't_cp_scoping_files'
--

CREATE SEQUENCE t_cp_scoping_files_seq;

CREATE TABLE IF NOT EXISTS t_cp_scoping_files (
  id int NOT NULL DEFAULT NEXTVAL ('t_cp_scoping_files_seq'),
  prjct_id int DEFAULT NULL,
  cmpny_id int DEFAULT NULL,
  file_name varchar(250) NOT NULL,
  PRIMARY KEY (id)
)    ;
 
ALTER SEQUENCE t_cp_scoping_files_seq RESTART WITH 9;

CREATE INDEX prjct_id ON t_cp_scoping_files (prjct_id);
CREATE INDEX cmpny_id ON t_cp_scoping_files (cmpny_id);

--
-- Dumping data for table 't_cp_scoping_files'
--

INSERT INTO t_cp_scoping_files (id, prjct_id, cmpny_id, file_name) VALUES
(7, 2, 7, 'Metal machining benchmarks.xlsx'),
(8, 2, 7, 'Mechanical Engineering.pdf');

-- --------------------------------------------------------

--
-- Table structure for table 't_doc'
--

CREATE SEQUENCE t_doc_seq;

CREATE TABLE IF NOT EXISTS t_doc (
  id int NOT NULL DEFAULT NEXTVAL ('t_doc_seq'),
  doc varchar(40) DEFAULT NULL,
  description varchar(200) DEFAULT NULL,
  PRIMARY KEY (id)
)   ;
 
ALTER SEQUENCE t_doc_seq RESTART WITH 1;

-- --------------------------------------------------------

--
-- Table structure for table 't_eqpmnt'
--

CREATE SEQUENCE t_eqpmnt_seq;

CREATE TABLE IF NOT EXISTS t_eqpmnt (
  id int NOT NULL DEFAULT NEXTVAL ('t_eqpmnt_seq'),
  name varchar(200) NOT NULL,
  name_tr varchar(200) DEFAULT NULL,
  active smallint NOT NULL,
  eqpmnt_type_id int DEFAULT NULL,
  PRIMARY KEY (id)
)    ;
 
ALTER SEQUENCE t_eqpmnt_seq RESTART WITH 6;

--
-- Dumping data for table 't_eqpmnt'
--

INSERT INTO t_eqpmnt (id, name, name_tr, active, eqpmnt_type_id) VALUES
(1, 'Casting Equipment', 'Döküm Tezgahları', 1, 0),
(2, 'Forming Equipment', 'Şekillendirme tezgahları', 1, 0),
(3, 'Joining Equipment', 'Birleştirme Tezgahları', 1, 0),
(4, 'Machining Equipment', 'Talaşlı imalat Tezgahları', 1, 0),
(5, 'Non-Traditional', 'Geleneksel Olmayan Süreçler', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table 't_eqpmnt_type'
--

CREATE SEQUENCE t_eqpmnt_type_seq;

CREATE TABLE IF NOT EXISTS t_eqpmnt_type (
  id int NOT NULL DEFAULT NEXTVAL ('t_eqpmnt_type_seq'),
  name varchar(200) DEFAULT NULL,
  name_tr varchar(200) DEFAULT NULL,
  mother_id int DEFAULT NULL,
  active smallint NOT NULL,
  PRIMARY KEY (id)
)    ;
 
ALTER SEQUENCE t_eqpmnt_type_seq RESTART WITH 37;

--
-- Dumping data for table 't_eqpmnt_type'
--

INSERT INTO t_eqpmnt_type (id, name, name_tr, mother_id, active) VALUES
(1, 'Centrifugal Casting Machine', 'Santrifüjal Döküm ', 1, 1),
(2, 'Die Casting', 'Press Döküm', 1, 1),
(3, 'Evaporative Pattern Casting', 'Buharlı Döküm', 1, 1),
(4, 'Law Pressure Casting', 'Düşük Basınçlı Döküm', 1, 1),
(5, 'Permanent Mold Casting', 'Daimi Kalıp Döküm', 1, 1),
(6, 'Forge', 'Dövme tezgahı', 2, 1),
(7, 'Powder Metallurgy', 'Toz Metalurjisi', 2, 1),
(8, 'Press', 'Press', 2, 1),
(9, 'Rolling Machine', 'Haddeleme', 2, 1),
(10, 'Shearing Machine', 'Kesme', 2, 1),
(11, 'Extrusion Machine', 'Çekme', 2, 1),
(12, 'Brazing(at Temperatures over 450°C)', 'Lehimleme (Sıcaklık > 450°C))', 3, 1),
(13, 'Fastening', 'Bağlama', 3, 1),
(14, 'Press Fitting', 'Baskılı Geçirme', 3, 1),
(15, 'Sintering', 'Sinterleme', 3, 1),
(16, 'Soldering(at Temperatures Less than 450°C)', 'Lehimleme ( Sıcaklık < 450°C)', 3, 1),
(17, 'Welding', 'Kaynak', 3, 1),
(18, 'Lathe', 'Torna', 4, 1),
(19, 'Milling', 'Freze', 4, 1),
(20, 'Machining Center', 'İşleme Merkezi', 4, 1),
(21, 'Shaper', 'Şekillendirme', 4, 1),
(22, 'Drilling Machine', 'Matkap', 4, 1),
(23, 'Broaching Machine', 'Broşlama- Tığ Çekme', 4, 1),
(24, 'Countersinking Machine', 'Havşa Tez.', 4, 1),
(25, 'Gashing Machine', 'Dişli Açma Makinesi', 4, 1),
(26, 'Grinding Machine', 'Taşlama Tez.', 4, 1),
(27, 'Hobbing Machine', 'Dişli Tezgahı', 4, 1),
(28, 'Honning Machine', 'Honlama Tezgahı', 4, 1),
(29, 'Router', 'Router Tezgahı', 4, 1),
(30, 'Saw', 'Testere', 4, 1),
(31, 'Tapping', 'Kılavuz Tezgahı', 4, 1),
(32, 'Reaming', 'Raybalama', 4, 1),
(33, 'planing', 'Rendeleme', 4, 1),
(34, 'Laser cutting', 'Laser Kesme', 5, 1),
(35, 'EDM', 'EDM', 5, 1),
(36, 'Wire EDM', 'Tel EDM', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table 't_eqpmnt_type_attrbt'
--

CREATE SEQUENCE t_eqpmnt_type_attrbt_seq;

CREATE TABLE IF NOT EXISTS t_eqpmnt_type_attrbt (
  id int NOT NULL DEFAULT NEXTVAL ('t_eqpmnt_type_attrbt_seq'),
  attribute_name varchar(50) DEFAULT NULL,
  attribute_name_tr varchar(50) DEFAULT NULL,
  attribute_value varchar(200) DEFAULT NULL,
  eqpmnt_type_id int DEFAULT NULL,
  active smallint DEFAULT NULL,
  PRIMARY KEY (id)
)    ;
 
ALTER SEQUENCE t_eqpmnt_type_attrbt_seq RESTART WITH 625;

CREATE INDEX eqpmnt_type_id ON t_eqpmnt_type_attrbt (eqpmnt_type_id);

--
-- Dumping data for table 't_eqpmnt_type_attrbt'
--

INSERT INTO t_eqpmnt_type_attrbt (id, attribute_name, attribute_name_tr, attribute_value, eqpmnt_type_id, active) VALUES
(1, 'Casting Size OD MIN.', 'Döküm Boyutu OD MIN.', 'mm', 1, 1),
(2, 'Casting Size OD MAX.', 'Döküm Boyutu OD MAX.', 'mm', 1, 1),
(3, 'Casting Length MIN', 'Min. Döküm Uzunluğu', 'mm', 1, 1),
(4, 'Casting Length MAX', 'Max. Döküm Uzunluğu', 'mm', 1, 1),
(5, 'Weight Limit', 'Ağırlık Limiti', 'kg', 1, 1),
(6, 'Standard Die Size', 'Standard Kalıp Boyutu', 'mm*mm', 1, 1),
(7, 'Total Power', 'Toplam Gücü', 'KW', 1, 1),
(8, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 1, 1),
(9, 'Machine Weight', 'Makina Ağırlığı', 'kg', 1, 1),
(10, 'Precision', 'Hassasiyet', '%', 1, 1),
(11, 'Accuracy', 'Doğruluk', 'micrometer', 1, 1),
(12, 'Production Date', 'Üretim Tarihi', 'year', 1, 1),
(13, 'Production Location', 'Üretim Yeri', '', 1, 1),
(14, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 1, 1),
(15, 'Maximum Ejector Stroke', 'Maximum Ejector Darbesi', 'mm', 2, 1),
(16, 'Total Die Opening', 'Toplam Kalıp Açıklığı', 'mm', 2, 1),
(17, 'Injection Plunger Diameter', 'Enjeksiyon Pistonu Çapı', 'mm', 2, 1),
(18, 'Injection Cylinder Diameter', 'Enjeksiyon Silindir Çapı', 'mm', 2, 1),
(19, 'Injection Plunger Stroke', 'Enjeksiyon Piston Darbesi', 'mm', 2, 1),
(20, 'Dry Shot Speed at 900 PSI ', 'Kuru Atış Hızı @ 900 psi', 'm/dk', 2, 1),
(21, 'Injection Capacity ', 'Enjeksiyon Kapasitesi', 'gram', 2, 1),
(22, 'Maximum Shot Weight', 'Maksimum Atış Ağırlığı', 'gram', 2, 1),
(23, 'Metal Pressure ', 'Metal Basinci', 'Pa', 2, 1),
(24, 'Clamping Force ', 'Sıkıştırma Kuvveti', 'Newton', 2, 1),
(25, 'Dry Cycle Speed', 'Kuru Dönüş hızı', 'rpm', 2, 1),
(26, 'Standard Die Size', 'Standard Kalıp Boyutu', 'mm*mm', 2, 1),
(27, 'Total Power', 'Toplam Gücü', 'KW', 2, 1),
(28, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 2, 1),
(29, 'Machine Weight', 'Makina Ağırlığı', 'kg', 2, 1),
(30, 'Precision', 'Hassasiyet', '%', 2, 1),
(31, 'Accuracy', 'Doğruluk', 'micrometer', 2, 1),
(32, 'Production Date', 'Üretim Tarihi', 'year', 2, 1),
(33, 'Production Location', 'Üretim Yeri', '', 2, 1),
(34, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 2, 1),
(35, 'Vacuum Stablized System', 'Vacum Denge Sistemi', '', 3, 1),
(36, 'Molding System', 'Döküm Yöntemi', '', 3, 1),
(37, 'Sand Reclamation System', 'Kum Geri Kazanım Yöntemi', '', 3, 1),
(38, 'Standard Die Size', 'Standard Kalıp Boyutu', 'mm*mm', 3, 1),
(39, 'Total Power', 'Toplam Gücü', 'KW', 3, 1),
(40, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 3, 1),
(41, 'Machine Weight', 'Makina Ağırlığı', 'kg', 3, 1),
(42, 'Precision', 'Hassasiyet', '%', 3, 1),
(43, 'Accuracy', 'Doğruluk', 'micrometer', 3, 1),
(44, 'Production Date', 'Üretim Tarihi', 'year', 3, 1),
(45, 'Production Location', 'Üretim Yeri', '', 3, 1),
(46, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 3, 1),
(47, 'Crucible Capacity', 'Pota Kapasitesi', 'kg', 4, 1),
(48, 'Cylinder Spacing', 'Silindir Boşluğu', 'mm*mm', 4, 1),
(49, 'Open Type Force', 'Açık kuvvet tipi', 'Newton', 4, 1),
(50, 'Rated-Locking Force', 'Kilitleme Kuvveti', 'Newton', 4, 1),
(51, 'Move Template Trip', 'Kalıp Hareketi', 'mm', 4, 1),
(52, 'Hydraulic System Work Pressure', 'Hidrolik Sistem Çalışma Basıncı', 'Pa', 4, 1),
(53, 'Static Model Core-Inserting Force', 'Statik Modele Çekirdek Ekleme Kuvveti', 'Newton', 4, 1),
(54, 'Static Model Core-Pulling Force', 'Static Modele Çekirdek Çekme Kuvveti', 'Newton', 4, 1),
(55, 'The Static Model Core-Pulling Cylinder Center High', 'Statik Modelin Çekirdek Çekme Silindir Merkez Yüks', 'mm', 4, 1),
(56, 'Holding Furnace Power', 'Bekletme Fırın Gücü', 'KW', 4, 1),
(57, 'Oil Pump Motor Power', 'Yağ Pompası Motor Gücü', 'KW', 4, 1),
(58, 'Standard Die Size', 'Standard Kalıp Boyutu', 'mm*mm', 4, 1),
(59, 'Total Power', 'Toplam Gücü', 'KW', 4, 1),
(60, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 4, 1),
(61, 'Machine Weight', 'Makina Ağırlığı', 'kg', 4, 1),
(62, 'Precision', 'Hassasiyet', '%', 4, 1),
(63, 'Accuracy', 'Doğruluk', 'micrometer', 4, 1),
(64, 'Production Date', 'Üretim Tarihi', 'year', 4, 1),
(65, 'Production Location', 'Üretim Yeri', '', 4, 1),
(66, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 4, 1),
(67, 'Clamping Pressure', 'Sıkıştırma Basıncı', 'kg', 5, 1),
(68, 'Max. Mold Size', 'Max. Şablon Boyutu', 'mm*mm', 5, 1),
(69, 'Ram Stroke ', 'Ram darbesi', 'mm', 5, 1),
(70, 'Daylight Opening ', 'Gün Işığı Açıklığı', 'mm', 5, 1),
(71, 'Pressure Height Center ', 'Basınç Yüksekliği Merkezi', 'mm', 5, 1),
(72, 'Tie Bar Size ', 'Basma Kolu Boyutu', 'mm', 5, 1),
(73, 'Tilt Speed (Min.) ', 'Tilt Hızı (Min.) ', 'rpm', 5, 1),
(74, 'Standard Die Size', 'Standard Kalıp Boyutu', 'mm*mm', 5, 1),
(75, 'Total Power', 'Toplam Gücü', 'KW', 5, 1),
(76, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 5, 1),
(77, 'Machine Weight', 'Makina Ağırlığı', 'kg', 5, 1),
(78, 'Precision', 'Hassasiyet', '%', 5, 1),
(79, 'Accuracy', 'Doğruluk', 'micrometer', 5, 1),
(80, 'Production Date', 'Üretim Tarihi', 'year', 5, 1),
(81, 'Production Location', 'Üretim Yeri', '', 5, 1),
(82, 'Product Acquisition Date', 'Ürünü satın Alma Tarihi', 'year', 5, 1),
(83, 'Forging Station', 'Dövme İstasyon', '', 6, 1),
(84, 'Forging Force', 'Dövme kuvveti', 'Newton', 6, 1),
(85, 'Max. Cutt Off Diameter', 'Makisumum Kesme Çapı', 'mm', 6, 1),
(86, 'Speed Range', 'Hız Aralığı', 'm/min', 6, 1),
(87, 'Main Slide Stroke', 'Ana kayma darbesi', 'mm', 6, 1),
(88, 'Total Power', 'Toplam Gücü', 'KW', 6, 1),
(89, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 6, 1),
(90, 'Machine Weight', 'Makina Ağırlığı', 'kg', 6, 1),
(91, 'Precision', 'Hassasiyet', '%', 6, 1),
(92, 'Accuracy', 'Doğruluk', 'micrometer', 6, 1),
(93, 'Production Date', 'Üretim Tarihi', 'year', 6, 1),
(94, 'Production Location', 'Üretim Yeri', '', 6, 1),
(95, 'Product Acquisition Date', 'Ürünü satın Alma Tarihi', 'year', 6, 1),
(96, 'Max. Useful Diameter Of Pressure Chamber', 'Basınç Odası Maksimum Çapı', 'mm', 7, 1),
(97, 'Max. Useful Depth Of Pressure Chamber', 'Basınç Odası Makisumum Kullanılabilir Derinliği', 'mm', 7, 1),
(98, 'Max. Operating Pressure', 'Max. Çalışma Basıncı', 'Pa', 7, 1),
(99, 'Work Medium', 'Çalışma Ortamı', '', 7, 1),
(100, 'Manner Of Increasing Pressure', 'Artan Basınç Tarzı', '', 7, 1),
(101, 'Max Time Of Increasing Pressure', 'Maksimum Basınca Ulaşma Zamanı', 'dk', 7, 1),
(102, 'Time Of Keeping Pressure', 'Basıncı Koruma Süresi', 'dk', 7, 1),
(103, 'Pressure Loss Rate Within 5 Minutes', '5 Dakikalık Basınç Kaybı Hızı', 'Pa/min', 7, 1),
(104, 'Unloading Rate', 'Tahliye Oranı', 'unit/min', 7, 1),
(105, 'Hydraulic System Rating Pressure', 'Hidrolik Sistem Basınç Oranı', 'Pa', 7, 1),
(106, 'Temperature', 'Sıcaklık', 'degree', 7, 1),
(107, 'Total Power', 'Toplam Gücü', 'KW', 7, 1),
(108, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 7, 1),
(109, 'Machine Weight', 'Makina Ağırlığı', 'kg', 7, 1),
(110, 'Precision', 'Hassasiyet', '%', 7, 1),
(111, 'Accuracy', 'Doğruluk', 'micrometer', 7, 1),
(112, 'Production Date', 'Üretim Tarihi', 'year', 7, 1),
(113, 'Production Location', 'Üretim Yeri', '', 7, 1),
(114, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 7, 1),
(115, 'Nominal Pressure', 'Nominal Basınç', 'Newton', 8, 1),
(116, 'Ejecting Force', 'Çıkartma Kuvveti', 'Newton', 8, 1),
(117, 'Stroke of Slider', 'Kaydırma Darbesi', 'mm', 8, 1),
(118, 'Max. Opening Height', 'Maksimum Açılma Yüksekliği', 'mm', 8, 1),
(119, 'Table Size', 'Tabla Boyutu', 'mm*mm', 8, 1),
(120, 'EjectingSstroke', 'Fırlatma Darbesi', 'mm', 8, 1),
(121, 'Speed of Slider', 'Kaydırma Hızı', 'm/min', 8, 1),
(122, 'Total Power', 'Toplam Gücü', 'KW', 8, 1),
(123, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 8, 1),
(124, 'Machine Weight', 'Makina Ağırlığı', 'kg', 8, 1),
(125, 'Precision', 'Hassasiyet', '%', 8, 1),
(126, 'Accuracy', 'Doğruluk', 'micrometer', 8, 1),
(127, 'Production Date', 'Üretim Tarihi', 'year', 8, 1),
(128, 'Production Location', 'Üretim Yeri', '', 8, 1),
(129, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 8, 1),
(130, 'Max. Rolling Thickness', 'Max. Heddeleme Kalınlığı', 'mm', 9, 1),
(131, 'Max. Pre-Bending Thickness', 'Maksimum İlk Bükülme Kalınlığı', 'mm', 9, 1),
(132, 'Max. Rolling Width', 'Max. Heddeleme Genişliği', 'mm', 9, 1),
(133, 'Diameter of Upper Roller', 'Üst Silindirin Çapı', 'mm', 9, 1),
(134, 'Total Power', 'Toplam Gücü', 'KW', 9, 1),
(135, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 9, 1),
(136, 'Machine Weight', 'Makina Ağırlığı', 'kg', 9, 1),
(137, 'Precision', 'Hassasiyet', '%', 9, 1),
(138, 'Accuracy', 'Doğruluk', 'micrometer', 9, 1),
(139, 'Production Date', 'Üretim Tarihi', 'year', 9, 1),
(140, 'Production Location', 'Üretim Yeri', '', 9, 1),
(141, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 9, 1),
(142, 'Max. Shearing Thickness', 'Max. Kesme Kalınlığı', 'mm', 10, 1),
(143, 'Max.  Shearing Width', 'Max.  Kesme Genışliği', 'mm', 10, 1),
(144, 'Distance Betweein Uprights', 'Sütünlar Arası Mesafe', 'mm', 10, 1),
(145, 'Strokes Max. No.', 'Maksimum Darbe Miktarı', 'quantity', 10, 1),
(146, 'Background Stroke', 'Arkaplan Darbesi', 'mm', 10, 1),
(147, 'Shearing Angle', 'Kesme Açısı', 'degree', 10, 1),
(148, 'Working Table Height', 'İşleme Tabla Yüksekliği', 'mm', 10, 1),
(149, 'Total Power', 'Toplam Gücü', 'KW', 10, 1),
(150, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 10, 1),
(151, 'Machine Weight', 'Makina Ağırlığı', 'kg', 10, 1),
(152, 'Precision', 'Hassasiyet', '%', 10, 1),
(153, 'Accuracy', 'Doğruluk', 'micrometer', 10, 1),
(154, 'Production Date', 'Üretim Tarihi', 'year', 10, 1),
(155, 'Production Location', 'Üretim Yeri', '', 10, 1),
(156, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 10, 1),
(157, 'Compressed Air', 'Basınçlı Hava', 'Pa', 11, 1),
(158, 'Number of Controlled Axis', 'Kontrollü Eksen Sayısı', 'quantity', 11, 1),
(159, 'Min. Mend Radius', 'Kıvrılma Yarıçapı', 'mm', 11, 1),
(160, 'Applied Material', 'Uygulanmakta Olan Malzeme', '', 11, 1),
(161, 'Material Thickness', 'Malzeme Kalınlığı', 'mm', 11, 1),
(162, 'Processing Height', 'İşleme Yüksekliği', 'mm', 11, 1),
(163, 'Material Feeding Method', 'Malzeme Besleme Yöntemi', '', 11, 1),
(164, 'File Format', 'Dosya Formatı', '', 11, 1),
(165, 'Total Power', 'Toplam Gücü', 'KW', 11, 1),
(166, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 11, 1),
(167, 'Machine Weight', 'Makina Ağırlığı', 'kg', 11, 1),
(168, 'Rrecision', 'Hassasiyet', '%', 11, 1),
(169, 'Accuracy', 'Doğruluk', 'micrometer', 11, 1),
(170, 'Production Date', 'Üretim Tarihi', 'year', 11, 1),
(171, 'Production Location', 'Üretim Yeri', '', 11, 1),
(172, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 11, 1),
(173, 'Output Power Range', 'Çıkış Gücü Aralığı', 'Kw', 12, 1),
(174, 'Output Frequency Range', 'Çıkış Ferekans Aralığı', '1/seconed', 12, 1),
(175, 'Output Power Adjustable Range', 'Ayarlanabilir Çıkış Gücü Aralığı', 'Kw', 12, 1),
(176, 'Output Frequency Tracking ', 'Çıkış Frekans Takibi', '1/seconed', 12, 1),
(177, 'Closed-loop Control Stability', 'Kapalı Çevrim Kontrol Stabilitesi', '', 12, 1),
(178, 'Power Factor', 'Güç Faktörü', 'Kw', 12, 1),
(179, 'Input Voltage Range', 'Giriş Gerilimi Aralığı', 'volt', 12, 1),
(180, 'Overload Ability', 'Aşırı Yük Kapasitesi', '', 12, 1),
(181, 'Cabinet Protection Level', 'Kabine Koruma Seviyesi', '', 12, 1),
(182, 'Cooling Mode', 'Soğutma Yöntemi', '', 12, 1),
(183, 'Environment Temperature', 'Çevre Sıcaklığı', 'degree', 12, 1),
(184, 'Altitude', 'Yükseklik', 'mm', 12, 1),
(185, 'Input Voltage', 'Giriş Gerilimi', 'volt', 12, 1),
(186, 'Efficiency', 'Etkinlik', '%', 12, 1),
(187, 'Total Power', 'Toplam Gücü', 'KW', 12, 1),
(188, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 12, 1),
(189, 'Machine Weight', 'Makina Ağırlığı', 'kg', 12, 1),
(190, 'precision', 'Hassasiyet', '%', 12, 1),
(191, 'Accuracy', 'Doğruluk', 'micrometer', 12, 1),
(192, 'Production Date', 'Üretim Tarihi', 'year', 12, 1),
(193, 'Production Location', 'Üretim Yeri', '', 12, 1),
(194, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 12, 1),
(195, 'Air Consumption', 'Hava Tüketimi', 'm3/min', 13, 1),
(196, 'Head End Diameter', 'Düşü Yüksekliği', 'mm', 13, 1),
(197, 'Screw Diameter', 'Vida Çapı', 'mm', 13, 1),
(198, 'Screw Length', 'Vida Uzunluğu', 'mm', 13, 1),
(199, 'Motor Rotational Speed', 'Motor Dönme Hızı', 'rpm', 13, 1),
(200, 'Max. Air Pressure', 'Maksimum Hava Basıncı', 'Pa', 13, 1),
(201, 'Input Voltage', 'Giriş Gerilimi', 'rpm', 13, 1),
(202, 'Efficiency', 'Etkinlik', '%', 13, 1),
(203, 'Total Power', 'Toplam Gücü', 'KW', 13, 1),
(204, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 13, 1),
(205, 'Machine Weight', 'Makina Ağırlığı', 'kg', 13, 1),
(206, 'Precision', 'Hassasiyet', '%', 13, 1),
(207, 'Accuracy', 'Doğruluk', 'micrometer', 13, 1),
(208, 'Production Date', 'Üretim Tarihi', 'year', 13, 1),
(209, 'Production Location', 'Üretim Yeri', '', 13, 1),
(210, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 13, 1),
(211, 'Rotor Outer Diameter', 'Rotor Dış Çapı', 'mm', 14, 1),
(212, 'Rotor Stack Height  ', 'Rotorun Yığın Yüksekliği', 'mm', 14, 1),
(213, 'Rotor Slot Numbers ', 'Rotorun Delik Sayısı', 'quantity', 14, 1),
(214, 'Rotor Shaft Length ', 'Rotor Mili Uzunluğu', 'mm', 14, 1),
(215, 'Rotor Axle Diameter', 'Rotor Mili Çapı', 'mm', 14, 1),
(216, 'Max. Air Pressure', 'Maksimum Hava Basıncı', 'Pa', 14, 1),
(217, 'Input Voltage', 'Giriş Gerilimi', 'volt', 14, 1),
(218, 'Efficiency', 'Etkinlik', '%', 14, 1),
(219, 'Total Power', 'Toplam Gücü', 'KW', 14, 1),
(220, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 14, 1),
(221, 'Machine Weight', 'Makina Ağırlığı', 'kg', 14, 1),
(222, 'Precision', 'Hassasiyet', '%', 14, 1),
(223, 'Accuracy', 'Doğruluk', 'micrometer', 14, 1),
(224, 'Production Date', 'Üretim Tarihi', 'year', 14, 1),
(225, 'Production Location', 'Üretim Yeri', '', 14, 1),
(226, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 14, 1),
(227, 'Temperature Range    ', 'Sıcaklık Aralığı', 'Degree', 15, 1),
(228, 'Temperature Control Precision', 'Sıcaklık Kontrolü Hassasiyeti', 'Degree', 15, 1),
(229, 'Heating Power ', 'Isıtma Gücü', 'KW', 15, 1),
(230, 'Rated Current ', 'Nominal Akım', 'Amper', 15, 1),
(231, 'Stroke Length of Piston', 'Piston Kurs Boyu', 'mm', 15, 1),
(232, 'Max. Air pressure', 'Maksimum Hava Basıncı', 'Pa', 15, 1),
(233, 'Input Voltage', 'Giriş Gerilimi', 'volt', 15, 1),
(234, 'Efficiency', 'Etkinlik', '%', 15, 1),
(235, 'Total Power', 'Toplam Gücü', 'KW', 15, 1),
(236, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 15, 1),
(237, 'Machine Weight', 'Makina Ağırlığı', 'kg', 15, 1),
(238, 'Precision', 'Hassasiyet', '%', 15, 1),
(239, 'Accuracy', 'Doğruluk', 'micrometer', 15, 1),
(240, 'Production Date', 'Üretim Tarihi', 'year', 15, 1),
(241, 'Production Location', 'Üretim Yeri', '', 15, 1),
(242, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 15, 1),
(243, 'Control  Method', 'Kontrol Yöntemi', '', 16, 1),
(244, 'Convey or speed', 'Hiz', 'volt,Watt', 16, 1),
(245, 'PCB  Size', 'PCB  Boyutu', 'mm', 16, 1),
(246, 'Flux Capacity', 'Akı Kapasitesi', 'Liter', 16, 1),
(247, 'Pre-Heating Zone', 'Ön Isıtma Bölgesi', 'mm', 16, 1),
(248, 'Solder Pot Temperature', 'LehimPotası Sıcaklığı', 'degree', 16, 1),
(249, 'Solder Pot Capacity', 'LehimPotası Kapasitesi', 'Kg', 16, 1),
(250, 'Wave Motor Power', 'Dalga Motoru', 'kW', 16, 1),
(251, 'Finger Cleaning Pump Power', 'Parmak Temizleme Motoru', 'kW', 16, 1),
(252, 'Convey or Direction', 'Yön', '', 16, 1),
(253, 'Convey or Angle', 'Açı', 'degree', 16, 1),
(254, 'Flux  Pressure', 'Akı Basıncı', 'bar', 16, 1),
(255, 'Input Voltage', 'Giriş Gerilimi', 'volt', 16, 1),
(256, 'Efficiency', 'Etkinlik', '%', 16, 1),
(257, 'Total Power', 'Toplam Gücü', 'KW', 16, 1),
(258, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 16, 1),
(259, 'Machine Weight', 'Makina Ağırlığı', 'kg', 16, 1),
(260, 'Precision', 'Hassasiyet', '%', 16, 1),
(261, 'Accuracy', 'Doğruluk', 'micrometer', 16, 1),
(262, 'Production Date', 'Üretim Tarihi', 'year', 16, 1),
(263, 'Production Location', 'Üretim Yeri', '', 16, 1),
(264, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 16, 1),
(265, 'RatedOutput Current', 'Nominal Çıkış Akımı', 'Amper', 17, 1),
(266, 'Range of Welding Current Regulation', 'Kaynak Akımının Aralığı', 'Amper', 17, 1),
(267, 'No-load Voltage', 'Yüksüz Çalışma Gerilimi', 'volt', 17, 1),
(268, 'Duty Cycle', 'Görev Döngüsü', '%', 17, 1),
(269, 'Outer Covering Protection Rank', 'Dış Kaplama Koruması Derecesi', '', 17, 1),
(270, 'Insulation Grade', 'İzolasyon Seviyesi', '', 17, 1),
(271, 'Welding Rod Diameter', 'Kaynak Çubuğu Çapı', 'mm', 17, 1),
(272, 'Input Voltage', 'Giriş Gerilimi', 'volt', 17, 1),
(273, 'Efficiency', 'Etkinlik', '%', 17, 1),
(274, 'Total Power', 'Toplam Gücü', 'KW', 17, 1),
(275, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 17, 1),
(276, 'Machine Weight', 'Makina Ağırlığı', 'kg', 17, 1),
(277, 'Precision', 'Hassasiyet', '%', 17, 1),
(278, 'Accuracy', 'Doğruluk', 'micrometer', 17, 1),
(279, 'Production Date', 'Üretim Tarihi', 'year', 17, 1),
(280, 'Production Location', 'Üretim Yeri', '', 17, 1),
(281, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 17, 1),
(282, 'Travel in X/Y/Z', 'X/Y/Z Eksenlerindeki Hareket', 'mm', 18, 1),
(283, 'Bar Diameter', 'Çubuk Çapı', 'mm', 18, 1),
(284, 'Max. Part Length', 'Max. Parça Uzunluğu', 'mm', 18, 1),
(285, 'Swing Over Bed', 'Yatak Üstü Hareket Mesafesi', 'mm', 18, 1),
(286, 'Rapid Motion Speeds in X/Y/Z', ' X/Y/Z Eksenlerinde Yüksek Hareket Hızı', 'm/min', 18, 1),
(287, 'Work Feed X/Y/Z', ' X/Y/Z Eksenlerinde Besleme', 'm/min', 18, 1),
(288, 'Feed Force in X/Y/Z', 'Besleme Kuvveti X/Y/Z', 'Newton', 18, 1),
(289, 'Max. Spindle Speed', 'Max. Spindle Devri', 'rpm', 18, 1),
(290, 'Spindle Nose', 'Spindle Ucu', '', 18, 1),
(291, 'Max. Drive Power', 'Max. Sürüş Gücü', 'kw', 18, 1),
(292, 'Max. Torque', 'Max. Burulma Momenti', 'Nm', 18, 1),
(293, 'Table Size', 'Tabla Boyutu', 'mm', 18, 1),
(294, 'Max Load Weight', 'Maksimum Yük Miktarı', 'kg', 18, 1),
(295, 'Total Power', 'Toplam Gücü', 'KW', 18, 1),
(296, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 18, 1),
(297, 'Machine Weight', 'Makina Ağırlığı', 'kg', 18, 1),
(298, 'Precision', 'Hassasiyet', '%', 18, 1),
(299, 'Accuracy', 'Doğruluk', 'micrometer', 18, 1),
(300, 'Production Date', 'Üretim Tarihi', 'year', 18, 1),
(301, 'Production Location', 'Üretim Yeri', '', 18, 1),
(302, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 18, 1),
(303, 'Longitudinal Travel', 'Boylamsal Hareket', 'mm', 19, 1),
(304, 'Vertical Travel', 'Dikey Hareket', 'mm', 19, 1),
(305, 'T Slots', 'T Kanal', '', 19, 1),
(306, 'Rapid Speed Of Table', 'Tablanın Konumlama Hızı', 'm/dk', 19, 1),
(307, 'Cutting Speed Of Table', 'Tablanın Kesme Hızı', 'm/dk', 19, 1),
(308, 'Mainspindle Nose', 'Ana Spindle Ucu', '', 19, 1),
(309, 'Spindle Speed', 'Spindle Devri', 'rpm', 19, 1),
(310, 'Vertical Speed', 'Dikey Hız', 'rpm', 19, 1),
(311, 'Cross Speed', 'Çapraz Hız', 'm/dk', 19, 1),
(312, 'Horizontal Spindle Power', 'Yatay İş Spindle Gücü', 'KW', 19, 1),
(313, 'Table Longitudinal Feed', 'Tabla Boyuna Besleme Hızı', 'm/dk', 19, 1),
(314, 'Lubricating Oil Pump power', 'Yağlama Yağı Pompası Gücü', 'kW', 19, 1),
(315, 'Coolant Pump power', 'Soğutma Pompası Gücü', 'kW', 19, 1),
(316, 'Table Size', 'Tabla Boyutu', 'mm', 19, 1),
(317, 'Max Load Weight', 'Maksimum Yük Miktarı', 'kg', 19, 1),
(318, 'Total Power', 'Toplam Gücü', 'KW', 19, 1),
(319, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 19, 1),
(320, 'Machine Weight', 'Makina Ağırlığı', 'kg', 19, 1),
(321, 'Precision', 'Hassasiyet', '%', 19, 1),
(322, 'Accuracy', 'Doğruluk', 'micrometer', 19, 1),
(323, 'Production Date', 'Üretim Tarihi', 'year', 19, 1),
(324, 'Production Location', 'Üretim Yeri', '', 19, 1),
(325, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 19, 1),
(326, 'Tool Storage Capacity', 'Takım Depolama Kapasitesi', 'unit', 20, 1),
(327, 'Tool Shank', 'Takım Ucu', '', 20, 1),
(328, 'Model', 'Model', '', 20, 1),
(329, 'Spindle Power', 'Spindle Gücü', 'kw', 20, 1),
(330, 'Tool magazine Specs.', 'Takım Magazini Spesifikasyonları', '', 20, 1),
(331, 'Spindle Speed', 'Spindle Hızı', 'rpm', 20, 1),
(332, 'Linear Traveling Distance- X', 'Doğrusal Hareket Mesafesi-X', 'mm', 20, 1),
(333, 'Linear Traveling Distance- Y', 'Doğrusal Hareket Mesafesi-Y', 'mm', 20, 1),
(334, 'Linear Traveling Distance- Z', 'Doğrusal Hareket Mesafesi-Z', 'mm', 20, 1),
(335, 'Linear Rapid Traverse Rate- X', 'Doğrusal Travers Hızı X', 'm/min', 20, 1),
(336, 'Linear Rapid Traverse Rate- Y', 'Doğrusal Travers Hızı Y', 'm/min', 20, 1),
(337, 'Linear Rapid Traverse Rate- Z', 'Doğrusal Travers Hızı- Z', 'm/min', 20, 1),
(338, 'Rotational Rapid Traverse Rate- A', 'Dönme Travers Hızı- A', 'rpm', 20, 1),
(339, 'Rotational Rapid Traverse Rate- B', 'Dönme Travers Hızı- B', 'rpm', 20, 1),
(340, 'Rotational Rapid Traverse Rate- C', 'Dönme Travers Hızı- C', 'rpm', 20, 1),
(341, 'Rotational Degree- A', 'Dönme Derecesi- A', 'degree', 20, 1),
(342, 'Rotational Degree- B', 'Dönme Derecesi- B', 'degree', 20, 1),
(343, 'Rotational Degree- C', 'Dönme Derecesi- C', 'degree', 20, 1),
(344, 'Tool Magazine', 'Takım Magazini', 'pocket', 20, 1),
(345, 'Table Size', 'Tabla Boyutu', 'mm*mm', 20, 1),
(346, 'Max Load Weight', 'Maksimum Yük Miktarı', 'kg', 20, 1),
(347, 'Total Power', 'Toplam Gücü', 'KW', 20, 1),
(348, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 20, 1),
(349, 'Machine Weight', 'Makina Ağırlığı', 'kg', 20, 1),
(350, 'Precision', 'Hassasiyet', '%', 20, 1),
(351, 'Accuracy', 'Doğruluk', 'micrometer', 20, 1),
(352, 'Production Date', 'Üretim Tarihi', 'year', 20, 1),
(353, 'Production Location', 'Üretim Yeri', '', 20, 1),
(354, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 20, 1),
(355, 'MaximumStroke', 'Maksimum Darbe', 'mm', 21, 1),
(356, 'Max. distanceTable to Ram', 'Kafa ve Tabla Arası Maksimum Mesafe', 'mm', 21, 1),
(357, 'Min. distance Table to Ram', 'Kafa ve Tabla Arası Minimum Mesafe', 'mm', 21, 1),
(358, 'Table Size', 'Tabla Boyutu', 'mm*mm', 21, 1),
(359, 'Max Load Weight', 'Maksimum Yük Miktarı', 'kg', 21, 1),
(360, 'Total Power', 'Toplam Gücü', 'KW', 21, 1),
(361, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 21, 1),
(362, 'Machine Weight', 'Makina Ağırlığı', 'kg', 21, 1),
(363, 'Precision', 'Hassasiyet', '%', 21, 1),
(364, 'Accuracy', 'Doğruluk', 'micrometer', 21, 1),
(365, 'Production Date', 'Üretim Tarihi', 'year', 21, 1),
(366, 'Production Location', 'Üretim Yeri', '', 21, 1),
(367, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 21, 1),
(368, 'Spindle Taper', 'Spindle Tutucu', '', 22, 1),
(369, 'Spindle Travel', 'Spindle Hareketi', 'mm', 22, 1),
(370, 'Spindle Speed (RPM x Steps)', 'Spindle hızı (RPM x Steps)', 'rpm', 22, 1),
(371, 'Diameter of RAM (Quill)', 'Kafa Çapı (Quill)', 'mm', 22, 1),
(372, 'No. of Spindle Auto Feed Ranges (MM/REV)', 'Spindle''ın Otomatik Besleme Hızı', 'steps', 22, 1),
(373, 'Max / Min Distance Spindle Nose to Base', 'Spindle Burnu ile Kafası Arası Maks/Min Mesafe', 'mm', 22, 1),
(374, 'Max / Min Distance Spindle Center to Column', 'Spindle Merkezi ile Kolon Arasındaki Maksimum Mesa', 'mm', 22, 1),
(375, 'Vertical Travel of Arm', 'Dikey Hareket', 'mm', 22, 1),
(376, 'Horizontal Travel of Arm', 'Yatay Hareket', 'mm', 22, 1),
(377, 'Max Drilling Radius', 'Maksimum. Delme Yarı Çapı', 'mm', 22, 1),
(378, 'Diameter of Column', 'Sütun Çapı', 'mm', 22, 1),
(379, 'Coolant Tank', 'Soğutma Tankı', 'Liter', 22, 1),
(380, 'Drill Head Motor Power', 'Delme Motorunun Gücü', 'Kw', 22, 1),
(381, 'Elevating Motor Power', 'Yükseltme Motorunun Gücü', 'Kw', 22, 1),
(382, 'Table Size', 'Tabla Boyutu', 'mm*mm', 22, 1),
(383, 'Max Load Weight', 'Maksimum Yük Miktarı', 'kg', 22, 1),
(384, 'Total Power', 'Toplam Gücü', 'KW', 22, 1),
(385, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 22, 1),
(386, 'Machine Weight', 'Makina Ağırlığı', 'kg', 22, 1),
(387, 'Precision', 'Hassasiyet', '%', 22, 1),
(388, 'Accuracy', 'Doğruluk', 'micrometer', 22, 1),
(389, 'Production Date', 'Üretim Tarihi', 'year', 22, 1),
(390, 'Production Location', 'Üretim Yeri', '', 22, 1),
(391, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 22, 1),
(392, 'Pulling Capacity', 'Çekme Kapasitesi', 'kg', 23, 1),
(393, 'Max. cutting Speed', 'Max. Kesme Hızı', 'm/s', 23, 1),
(394, 'Max. Return Speed', 'Max. Geri Dönüş Hızı', 'm/s', 23, 1),
(395, 'Stroke', 'Darbe', 'mm', 23, 1),
(396, 'coolant Res. Capacity', 'Soğutucunun Direnç Kapasitesi', 'Pa', 23, 1),
(397, 'Floor Space', 'Kapsama Alanı', 'mm*mm', 23, 1),
(398, 'Table Size', 'Tabla Boyutu', 'mm*mm', 23, 1),
(399, 'Max Load Weight', 'Maksimum Yük Miktarı', 'kg', 23, 1),
(400, 'Total Power', 'Toplam Gücü', 'KW', 23, 1),
(401, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 23, 1),
(402, 'Machine Weight', 'Makina Ağırlığı', 'kg', 23, 1),
(403, 'Precision', 'Hassasiyet', '%', 23, 1),
(404, 'Accuracy', 'Doğruluk', 'micrometer', 23, 1),
(405, 'Production Date', 'Üretim Tarihi', 'year', 23, 1),
(406, 'Production Location', 'Üretim Yeri', '', 23, 1),
(407, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 23, 1),
(408, 'Rated Voltage ', 'Nominal Gerilim', 'volt', 24, 1),
(409, 'Max. Attraction ', 'Max. Çekim', 'Newton', 24, 1),
(410, 'Rated Input Power ', 'Nominal Giriş Gücü', 'Kw', 24, 1),
(411, 'No-load Speed ', 'Maksimum Hızı', 'm/min', 24, 1),
(412, 'Table Size', 'Tabla Boyutu', 'mm*mm', 24, 1),
(413, 'Max Load Weight', 'Maksimum Yük Miktarı', 'kg', 24, 1),
(414, 'Total Power', 'Toplam Gücü', 'KW', 24, 1),
(415, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 24, 1),
(416, 'Machine Weight', 'Makina Ağırlığı', 'kg', 24, 1),
(417, 'Precision', 'Hassasiyet', '%', 24, 1),
(418, 'Accuracy', 'Doğruluk', 'micrometer', 24, 1),
(419, 'Production Date', 'Üretim Tarihi', 'year', 24, 1),
(420, 'Production Location', 'Üretim Yeri', '', 24, 1),
(421, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 24, 1),
(422, 'Part Max. Diameter', 'Parçanin Max. Çapı', 'mm', 25, 1),
(423, 'Max. Module ', 'Max. Modül', 'M', 25, 1),
(424, 'Max. Gear Width ', 'Max. Vites Aralığı', 'mm', 25, 1),
(425, 'Table Max. Weight ', 'Tablanın Max. Ağırlığı', 'kg', 25, 1),
(426, 'Table Size', 'Tabla Boyutu', 'mm*mm', 25, 1),
(427, 'Max Load Weight', 'Maksimum Yük Miktarı', 'kg', 25, 1),
(428, 'Total Power', 'Toplam Gücü', 'KW', 25, 1),
(429, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 25, 1),
(430, 'Machine Weight', 'Makina Ağırlığı', 'kg', 25, 1),
(431, 'Precision', 'Hassasiyet', '%', 25, 1),
(432, 'Accuracy', 'Doğruluk', 'micrometer', 25, 1),
(433, 'Production Date', 'Üretim Tarihi', 'year', 25, 1),
(434, 'Production Location', 'Üretim Yeri', '', 25, 1),
(435, 'Product Acquisition Date', 'Ürünü satın Alma Tarihi', 'year', 25, 1),
(436, 'Maximum Size of Workpiece', 'Parçanin Max. Boyutu', 'mm', 26, 1),
(437, 'The Grinding Workpiece Height Size', 'Taşalama İş Parçası Boyutu', 'mm', 26, 1),
(438, 'The Maximum Speed of the Grinding Heel Spindle', 'Taşlama Topuk Milinin Maksimum Hızı', 'rpm', 26, 1),
(439, 'Grinding Wheel/ Diameter', 'Bileme Teker Çapı', 'mm', 26, 1),
(440, 'Wheelhead Feed Speed ', 'Dişli Besleme Hızı', 'm/dk', 26, 1),
(441, 'Chuck Workpiece Speed', 'Ayna Hızı', 'm/dk', 26, 1),
(442, 'Table Size', 'Tabla Boyutu', 'mm*mm', 26, 1),
(443, 'Max Load Weight', 'Maksimum Yük Miktarı', 'kg', 26, 1),
(444, 'Total Power', 'Toplam Gücü', 'KW', 26, 1),
(445, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 26, 1),
(446, 'Machine Weight', 'Makina Ağırlığı', 'kg', 26, 1),
(447, 'Precision', 'Hassasiyet', '%', 26, 1),
(448, 'Accuracy', 'Doğruluk', 'micrometer', 26, 1),
(449, 'Production Date', 'Üretim Tarihi', 'year', 26, 1),
(450, 'Production Location', 'Üretim Yeri', '', 26, 1),
(451, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 26, 1),
(452, 'Max Machining Diameter', 'Max İşleme Çapı', 'mm', 27, 1),
(453, 'Max Modulus', 'Max. Modül', 'mm', 27, 1),
(454, 'Max Machining Width', 'Max İşleme Genişliği', 'mm', 27, 1),
(455, 'Max Diameter/Length of Hob', 'Freze Bıçağının Maksimum Çapı ve Uzunluğu', 'mm', 27, 1),
(456, 'Scope of Main Tool Turning Speed and Grade', 'Ana Tornaalam Hızı ve Derecesi', 'rpm', 27, 1),
(457, 'Arbor Diameter', 'Malafa Çapı', 'mm', 27, 1),
(458, 'Arbor Diameter of Workpiece', 'Parçanın Malafa Çapı', 'mm', 27, 1),
(459, 'Max Axial Travel of Tool', 'Takımın Maksimum Eksenel Hareketi', 'mm', 27, 1),
(460, 'Max Turning Angle of Hob', 'Maksimum freze bıçağının dönme açısı', 'degree', 27, 1),
(461, 'Worktable Aperture', 'Tabla Açıklığı', 'mm', 27, 1),
(462, 'Spindle Taper', 'Spindle Tutucu', '', 27, 1),
(463, 'Distance from Hob Center to Worktable Face', 'Tablanın Freze Bıçağına Olan Mesafesi', 'mm', 27, 1),
(464, 'Distance from Hob Center to Worktable Axis Center', 'Tablanın Eksen Merkezinin Freze Bıçağına Olan Mesa', 'mm', 27, 1),
(465, 'Table Size', 'Tabla Boyutu', 'mm*mm', 27, 1),
(466, 'Max Load Weight', 'Maksimum Yük Miktarı', 'kg', 27, 1),
(467, 'Total Power', 'Toplam Gücü', 'KW', 27, 1),
(468, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 27, 1),
(469, 'Machine Weight', 'Makina Ağırlığı', 'kg', 27, 1),
(470, 'Precision', 'Hassasiyet', '%', 27, 1),
(471, 'Accuracy', 'Doğruluk', 'micrometer', 27, 1),
(472, 'Production Date', 'Üretim Tarihi', 'year', 27, 1),
(473, 'Production Location', 'Üretim Yeri', '', 27, 1),
(474, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 27, 1),
(475, 'Max. Turning Diameter', 'Max. Tornalama Çapı', 'mm', 28, 1),
(476, 'Max. Height of Workpiece', 'Max. Parça uzunluğu', 'mm', 28, 1),
(477, 'Workbench Diameter', 'Tabla Çapı', 'mm', 28, 1),
(478, 'Workbench Speed Series', 'Tablanın Hızı', 'rpm', 28, 1),
(479, 'Workbench Speed Range', 'Tabla Hızının Aralığı', 'rpm', 28, 1),
(480, 'Max. Workbench Torque', 'Maksimum Tablanın Torku', 'N*m', 28, 1),
(481, 'Max. Cutting Force of Knife Rest', 'Kesicinin Maksimum Kesme Kuvveti', 'Newton', 28, 1),
(482, 'RAM Travel of Vertical Slide', 'Dikey Sürgünün Ram Hareketi', 'mm', 28, 1),
(483, 'Table Size', 'Tabla Boyutu', 'mm*mm', 28, 1),
(484, 'Max Load Weight', 'Maksimum Yük Miktarı', 'kg', 28, 1),
(485, 'Total Power', 'Toplam Gücü', 'KW', 28, 1),
(486, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 28, 1),
(487, 'Machine Weight', 'Makina Ağırlığı', 'kg', 28, 1),
(488, 'Precision', 'Hassasiyet', '%', 28, 1),
(489, 'Accuracy', 'Doğruluk', 'micrometer', 28, 1),
(490, 'Production Date', 'Üretim Tarihi', 'year', 28, 1),
(491, 'Production Location', 'Üretim Yeri', '', 28, 1),
(492, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 28, 1),
(493, 'WorkingSpeed ', 'Çalışma Hızı', 'mm/s', 29, 1),
(494, 'Spindle Motor', 'Spindle Motoru', 'KW', 29, 1),
(495, 'Engraving Speed  ', 'Oyma Hızı', 'mm/s', 29, 1),
(496, 'Rotation Speed of Spindle Motor ', 'Spindle Motorunun Dönüş Hızı', 'rpm', 29, 1),
(497, 'Engraving Tool', 'Oyma Takımları', '', 29, 1),
(498, 'Ball Screw ', 'Bilyalı Vida', '', 29, 1),
(499, 'Resolution', 'Çözünürlük', 'mm', 29, 1),
(500, 'Table Size', 'Tabla Boyutu', 'mm*mm', 29, 1),
(501, 'Max Load Weight', 'Maksimum Yük Miktarı', 'kg', 29, 1),
(502, 'Total Power', 'Toplam Gücü', 'KW', 29, 1),
(503, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 29, 1),
(504, 'Machine Weight', 'Makina Ağırlığı', 'kg', 29, 1),
(505, 'Precision', 'Hassasiyet', '%', 29, 1),
(506, 'Accuracy', 'Doğruluk', 'micrometer', 29, 1),
(507, 'Production Date', 'Üretim Tarihi', 'year', 29, 1),
(508, 'Production Location', 'Üretim Yeri', '', 29, 1),
(509, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 29, 1),
(510, 'Main Drive Motor', 'Ana Motor Sürücüsü', 'KW', 30, 1),
(511, 'Blade Speeds', 'Bıçak Hızları', 'rpm', 30, 1),
(512, 'Head Swivel', 'Döner Kafa', 'degree', 30, 1),
(513, 'Clamping Vise', 'Mengene', 'mm', 30, 1),
(514, 'Coolant Pump Motor', 'Soğutucu Pompa Motoru', 'KW', 30, 1),
(515, 'Max. Clamping Capacity', 'Maksimum Sıkma Kapasitesi', 'number/pocket', 30, 1),
(516, 'Saw Blade Size', 'Testere Bıçak Boyutu', 'mm', 30, 1),
(517, 'Pin Hole of Saw Blade', 'Testerenin Pim Deliği', 'mm', 30, 1),
(518, 'Selective Feeding Speed', 'Besleme Hızı', 'mm', 30, 1),
(519, 'Hydrauic Pump Motor', 'Hidrolik Motor Pompası', 'KW', 30, 1),
(520, 'Operating Pressure', 'Çalışma Basıncı', 'Pa', 30, 1),
(521, 'Air Pressure Consumption', 'Hava Basıncı tüketımı', 'Pa', 30, 1),
(522, 'Servomotor Of Material Line-Up', 'Malzeme Sürme', 'Kw', 30, 1),
(523, 'Servomotor Of Feeding', 'Servo Motorun Beslemesi', 'Kw', 30, 1),
(524, 'Table Size', 'Tabla Boyutu', 'mm*mm', 30, 1),
(525, 'Max Load Weight', 'Maksimum Yük Miktarı', 'kg', 30, 1),
(526, 'Total Power', 'Toplam Gücü', 'KW', 30, 1),
(527, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 30, 1),
(528, 'Machine Weight', 'Makina Ağırlığı', 'kg', 30, 1),
(529, 'Precision', 'Hassasiyet', '%', 30, 1),
(530, 'Accuracy', 'Doğruluk', 'micrometer', 30, 1),
(531, 'Production Date', 'Üretim Tarihi', 'year', 30, 1),
(532, 'Production Location', 'Üretim Yeri', '', 30, 1),
(533, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 30, 1),
(534, 'X,Y,Z Axis travel ', 'X/Y/Z Eksenlerindeki Hareket', 'mm', 31, 1),
(535, 'Spindle Nose to Worktable', 'Spindle Burnunun Tablaya Olan Uzaklığı', 'mm', 31, 1),
(536, 'Spindle Centerline to Column', 'Spindle ile Kolon Arası Mesafe', 'mm', 31, 1),
(537, 'Spindle Taper', 'Spindle Tutucu', '', 31, 1),
(538, 'Spindle Speed', 'Spindle Hızı', 'rpm', 31, 1),
(539, 'Max Gearbox Ratio', 'Maksimum Şanzıman Oranı', '', 31, 1),
(540, 'Max Torque', 'Max Burulma Momenti', 'n*m', 31, 1),
(541, 'Tool Change Type', 'Takım Magazini', '', 31, 1),
(542, 'Mini Display Unit', 'Mini Ekran Ünitesi', 'mm', 31, 1),
(543, 'Triaxial Motor', 'Üç Eksenli Motor', 'Kw', 31, 1),
(544, 'Ball Screw Types', 'Bilyalı Vida Tipleri', '', 31, 1),
(545, 'Table Size', 'Tabla Boyutu', 'mm*mm', 31, 1),
(546, 'Max Load Weight', 'Maksimum Yük Miktarı', 'kg', 31, 1),
(547, 'Total Power', 'Toplam Gücü', 'KW', 31, 1),
(548, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 31, 1),
(549, 'Machine Weight', 'Makina Ağırlığı', 'kg', 31, 1),
(550, 'Precision', 'Hassasiyet', '%', 31, 1),
(551, 'Accuracy', 'Doğruluk', 'micrometer', 31, 1),
(552, 'Production Date', 'Üretim Tarihi', 'year', 31, 1),
(553, 'Production Location', 'Üretim Yeri', '', 31, 1),
(554, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 31, 1),
(555, 'Spindle Travel', 'Spindle Hareketi', 'mm', 32, 1),
(556, 'Spindle Speeds', 'Spindle Hızları', 'rpm', 32, 1),
(557, 'Distance from Spindle Nose to Worktable', 'Spindle ile Tabla Arası Uzaklık', 'mm', 32, 1),
(558, 'Distance from Spindle Axis to Column Surface', 'Spindle ile Kolon Yüzeyi Arasındaki Mesafe', 'mm', 32, 1),
(559, 'Diameter of Column', 'Sütunun Çapı', 'mm', 32, 1),
(560, 'Outline Dimension ', 'Taslak Uzunlukarı', 'mm', 32, 1),
(561, 'Table Size', 'Tabla Boyutu', 'mm*mm', 32, 1),
(562, 'Max Load Weight', 'Maksimum Yük Miktarı', 'kg', 32, 1),
(563, 'Total Power', 'Toplam Gücü', 'KW', 32, 1),
(564, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 32, 1),
(565, 'Machine Weight', 'Makina Ağırlığı', 'kg', 32, 1),
(566, 'Precision', 'Hassasiyet', '%', 32, 1),
(567, 'Accuracy', 'Doğruluk', 'micrometer', 32, 1),
(568, 'Production Date', 'Üretim Tarihi', 'year', 32, 1),
(569, 'Production Location', 'Üretim Yeri', '', 32, 1),
(570, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 32, 1),
(571, 'Travels', 'Hareketler', 'mm', 33, 1),
(572, 'Spindle diameter', 'Spindle Çapları', 'mm', 33, 1),
(573, 'Table Size', 'Tabla Boyutu', 'mm*mm', 33, 1),
(574, 'Max Load weight', 'Maksimum Yük Miktarı', 'kg', 33, 1),
(575, 'Total Power', 'Toplam Gücü', 'KW', 33, 1),
(576, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 33, 1),
(577, 'Machine Weight', 'Makina Ağırlığı', 'kg', 33, 1),
(578, 'Precision', 'Hassasiyet', '%', 33, 1),
(579, 'Accuracy', 'Doğruluk', 'micrometer', 33, 1),
(580, 'Production Date', 'Üretim Tarihi', 'year', 33, 1),
(581, 'Production Location', 'Üretim Yeri', '', 33, 1),
(582, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 33, 1),
(583, 'Working Area ', 'Çalışma Alanı', '', 34, 1),
(584, 'Rapid Speed', 'Hız', 'm/min', 34, 1),
(585, 'Total Power', 'Toplam Gücü', 'KW', 34, 1),
(586, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 34, 1),
(587, 'Machine Weight', 'Makina Ağırlığı', 'kg', 34, 1),
(588, 'Precision', 'Hassasiyet', '%', 34, 1),
(589, 'Accuracy', 'Doğruluk', 'micrometer', 34, 1),
(590, 'Production Date', 'Üretim Tarihi', 'year', 34, 1),
(591, 'Production Location', 'Üretim Yeri', '', 34, 1),
(592, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 34, 1),
(593, 'Stroke(X)', 'Darbe(X)', 'mm', 35, 1),
(594, 'Stroke(Y)', 'Darbe(Y)', 'mm', 35, 1),
(595, 'Stroke(Z)', 'Darbe(Z)', 'mm', 35, 1),
(596, 'Spindle Stroke', 'Spindle Darbesi', 'mm', 35, 1),
(597, 'Max.Processing Current', 'Maksimum Akım', 'amper', 35, 1),
(598, 'Max.Cutting Speed', 'Maksimum Kesme Hızı', 'm/min', 35, 1),
(599, 'Min.Electrode Consumption', 'Minimum Elektrot Tüketimi', 'm/min', 35, 1),
(600, 'Optimum Roughness', 'Optimum Pürüzlülük', 'micrometer', 35, 1),
(601, 'Total Power', 'Toplam Gücü', 'KW', 35, 1),
(602, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 35, 1),
(603, 'Machine Weight', 'Makina Ağırlığı', 'kg', 35, 1),
(604, 'Precision', 'Hassasiyet', '%', 35, 1),
(605, 'Accuracy', 'Doğruluk', 'micrometer', 35, 1),
(606, 'Production Date', 'Üretim Tarihi', 'year', 35, 1),
(607, 'Production Location', 'Üretim Yeri', '', 35, 1),
(608, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 35, 1),
(609, 'Stroke(X)', 'Darbe(X)', 'mm', 36, 1),
(610, 'Stroke(Y)', 'Darbe(Y)', 'mm', 36, 1),
(611, 'Stroke(Z)', 'Darbe(Z)', 'mm', 36, 1),
(612, 'Spindle Stroke', 'Spindle Darbesi', 'mm', 36, 1),
(613, 'Max.Processing Current', 'Maksimum Akım', 'amper', 36, 1),
(614, 'Max.Cutting Speed', 'Maksimum Kesme Hızı', 'm/min', 36, 1),
(615, 'Min.Electrode Consumption', 'Minimum Elektrot Tüketimi', 'm/min', 36, 1),
(616, 'Optimum Roughness', 'Optimum Pürüzlülük', 'micrometer', 36, 1),
(617, 'Total Power', 'Toplam Gücü', 'KW', 36, 1),
(618, 'Machine Dimension', 'Makina Boyutları', 'mm*mm*mm', 36, 1),
(619, 'Machine Weight', 'Makina Ağırlığı', 'kg', 36, 1),
(620, 'Precision', 'Hassasiyet', '%', 36, 1),
(621, 'Accuracy', 'Doğruluk', 'micrometer', 36, 1),
(622, 'Production Date', 'Üretim Tarihi', 'year', 36, 1),
(623, 'Production Location', 'Üretim Yeri', '', 36, 1),
(624, 'Product Acquisition Date', 'Ürünü Satın Alma Tarihi', 'year', 36, 1);

-- --------------------------------------------------------

--
-- Table structure for table 't_flow'
--

CREATE SEQUENCE t_flow_seq;

CREATE TABLE IF NOT EXISTS t_flow (
  id int NOT NULL DEFAULT NEXTVAL ('t_flow_seq'),
  name varchar(200) NOT NULL,
  name_tr varchar(200) DEFAULT NULL,
  active smallint NOT NULL,
  PRIMARY KEY (id)
)    ;
 
ALTER SEQUENCE t_flow_seq RESTART WITH 4;

--
-- Dumping data for table 't_flow'
--

INSERT INTO t_flow (id, name, name_tr, active) VALUES
(1, 'Water', 'Water', 1),
(2, 'Electricity', 'Electricity', 1),
(3, 'Air', 'Hava', 1);

-- --------------------------------------------------------

--
-- Table structure for table 't_flow_type'
--

CREATE SEQUENCE t_flow_type_seq;

CREATE TABLE IF NOT EXISTS t_flow_type (
  id int NOT NULL DEFAULT NEXTVAL ('t_flow_type_seq'),
  name varchar(200) DEFAULT NULL,
  name_tr varchar(200) DEFAULT NULL,
  active smallint NOT NULL,
  PRIMARY KEY (id)
)    ;
 
ALTER SEQUENCE t_flow_type_seq RESTART WITH 3;

--
-- Dumping data for table 't_flow_type'
--

INSERT INTO t_flow_type (id, name, name_tr, active) VALUES
(1, 'Input', 'Input', 1),
(2, 'Output', 'Output', 1);

-- --------------------------------------------------------

--
-- Table structure for table 't_nace_code'
--

CREATE SEQUENCE t_nace_code_seq;

CREATE TABLE IF NOT EXISTS t_nace_code (
  id int NOT NULL DEFAULT NEXTVAL ('t_nace_code_seq'),
  name_tr varchar(255) DEFAULT NULL,
  code varchar(255) NOT NULL,
  name varchar(255) NOT NULL,
  active int NOT NULL,
  PRIMARY KEY (id)
)    ;
 
ALTER SEQUENCE t_nace_code_seq RESTART WITH 2187;

--
-- Dumping data for table 't_nace_code'
--

INSERT INTO t_nace_code (id, name_tr, code, name, active) VALUES
(1, 'PERAKENDE TİCARET', '47.11.01', '', 0),
(2, 'PERAKENDE TİCARET', '47.11.02', '', 0),
(3, 'PERAKENDE TİCARET', '47.11.03', '', 0),
(4, 'PERAKENDE TİCARET', '47.19.01', '', 0),
(5, 'PERAKENDE TİCARET', '47.25.01', '', 0),
(6, 'PERAKENDE TİCARET', '47.25.03', '', 0),
(7, 'PERAKENDE TİCARET', '47.26.01', '', 0),
(8, 'PERAKENDE TİCARET', '47.29.04', '', 0),
(9, 'PERAKENDE TİCARET', '47.59.13', '', 0),
(10, 'PERAKENDE TİCARET', '47.59.14', '', 0),
(11, 'PERAKENDE TİCARET', '47.59.90', '', 0),
(12, 'PERAKENDE TİCARET', '47.76.01', '', 0),
(13, 'PERAKENDE TİCARET', '47.78.26', '', 0),
(14, 'PERAKENDE TİCARET', '47.78.90', '', 0),
(15, 'PERAKENDE TİCARET', '47.79.90', '', 0),
(16, 'PERAKENDE TİCARET', '47.89.90', '', 0),
(17, 'PERAKENDE TİCARET', '47.91.14', '', 0),
(18, 'PERAKENDE TİCARET', '47.99.10', '', 0),
(19, 'PERAKENDE TİCARET', '47.99.11', '', 0),
(20, 'PERAKENDE TİCARET', '47.99.13', '', 0),
(21, 'TOPTAN VE DIŞ TİCARET', '46.19.01', '', 0),
(22, 'TOPTAN VE DIŞ TİCARET', '46.49.08', '', 0),
(23, 'TOPTAN VE DIŞ TİCARET', '46.49.22', '', 0),
(24, 'TOPTAN VE DIŞ TİCARET', '46.90.01', '', 0),
(25, 'TOPTAN VE DIŞ TİCARET', '46.90.04', '', 0),
(26, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '23.19.04', '', 0),
(27, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '23.41.02', '', 0),
(28, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '23.41.03', '', 0),
(29, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '23.41.04', '', 0),
(30, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '32.12.06', '', 0),
(31, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '32.13.01', '', 0),
(32, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '32.40.03', '', 0),
(33, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '32.40.04', '', 0),
(34, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '32.40.05', '', 0),
(35, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '32.40.07', '', 0),
(36, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '32.40.08', '', 0),
(37, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '32.40.09', '', 0),
(38, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '32.40.11', '', 0),
(39, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '32.40.90', '', 0),
(40, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '32.99.03', '', 0),
(41, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '32.99.18', '', 0),
(42, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '46.18.01', '', 0),
(43, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '46.19.02', '', 0),
(44, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '46.49.04', '', 0),
(45, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '46.49.05', '', 0),
(46, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '46.49.12', '', 0),
(47, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '46.49.90', '', 0),
(48, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '47.26.02', '', 0),
(49, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '47.64.01', '', 0),
(50, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '47.64.03', '', 0),
(51, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '47.65.01', '', 0),
(52, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '47.78.04', '', 0),
(53, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '47.79.01', '', 0),
(54, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '47.79.05', '', 0),
(55, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '47.89.08', '', 0),
(56, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '47.89.16', '', 0),
(57, 'BİJUTERİ, OYUNCAK VE HEDİYELİK EŞYA', '95.29.90', '', 0),
(58, 'KUYUMCULUK', '24.41.16', '', 0),
(59, 'KUYUMCULUK', '24.41.17', '', 0),
(60, 'KUYUMCULUK', '24.41.18', '', 0),
(61, 'KUYUMCULUK', '32.11.01', '', 0),
(62, 'KUYUMCULUK', '32.12.01', '', 0),
(63, 'KUYUMCULUK', '32.12.04', '', 0),
(64, 'KUYUMCULUK', '32.12.07', '', 0),
(65, 'KUYUMCULUK', '46.48.01', '', 0),
(66, 'KUYUMCULUK', '46.72.03', '', 0),
(67, 'KUYUMCULUK', '46.76.03', '', 0),
(68, 'KUYUMCULUK', '47.77.01', '', 0),
(69, 'KUYUMCULUK', '47.77.02', '', 0),
(70, 'KUYUMCULUK', '47.77.05', '', 0),
(71, 'KUYUMCULUK', '95.25.02', '', 0),
(72, 'BİLGİ TEKNOLOJİLERİ', '26.20.01', '', 0),
(73, 'BİLGİ TEKNOLOJİLERİ', '28.23.01', '', 0),
(74, 'BİLGİ TEKNOLOJİLERİ', '28.23.02', '', 0),
(75, 'BİLGİ TEKNOLOJİLERİ', '28.23.03', '', 0),
(76, 'BİLGİ TEKNOLOJİLERİ', '28.23.04', '', 0),
(77, 'BİLGİ TEKNOLOJİLERİ', '28.23.05', '', 0),
(78, 'BİLGİ TEKNOLOJİLERİ', '28.23.06', '', 0),
(79, 'BİLGİ TEKNOLOJİLERİ', '28.23.07', '', 0),
(80, 'BİLGİ TEKNOLOJİLERİ', '28.23.08', '', 0),
(81, 'BİLGİ TEKNOLOJİLERİ', '33.12.18', '', 0),
(82, 'BİLGİ TEKNOLOJİLERİ', '46.14.01', '', 0),
(83, 'BİLGİ TEKNOLOJİLERİ', '46.51.01', '', 0),
(84, 'BİLGİ TEKNOLOJİLERİ', '46.66.01', '', 0),
(85, 'BİLGİ TEKNOLOJİLERİ', '47.41.01', '', 0),
(86, 'BİLGİ TEKNOLOJİLERİ', '47.78.08', '', 0),
(87, 'BİLGİ TEKNOLOJİLERİ', '47.89.17', '', 0),
(88, 'BİLGİ TEKNOLOJİLERİ', '58.21.01', '', 0),
(89, 'BİLGİ TEKNOLOJİLERİ', '58.29.01', '', 0),
(90, 'BİLGİ TEKNOLOJİLERİ', '62.01.01', '', 0),
(91, 'BİLGİ TEKNOLOJİLERİ', '62.02.01', '', 0),
(92, 'BİLGİ TEKNOLOJİLERİ', '62.03.01', '', 0),
(93, 'BİLGİ TEKNOLOJİLERİ', '62.09.01', '', 0),
(94, 'BİLGİ TEKNOLOJİLERİ', '62.09.02', '', 0),
(95, 'BİLGİ TEKNOLOJİLERİ', '95.11.01', '', 0),
(96, 'KAĞIT VE KIRTASİYE', '17.11.08', '', 0),
(97, 'KAĞIT VE KIRTASİYE', '17.12.07', '', 0),
(98, 'KAĞIT VE KIRTASİYE', '17.21.10', '', 0),
(99, 'KAĞIT VE KIRTASİYE', '17.21.11', '', 0),
(100, 'KAĞIT VE KIRTASİYE', '17.21.12', '', 0),
(101, 'KAĞIT VE KIRTASİYE', '17.21.13', '', 0),
(102, 'KAĞIT VE KIRTASİYE', '17.22.02', '', 0),
(103, 'KAĞIT VE KIRTASİYE', '17.22.03', '', 0),
(104, 'KAĞIT VE KIRTASİYE', '17.22.04', '', 0),
(105, 'KAĞIT VE KIRTASİYE', '17.23.04', '', 0),
(106, 'KAĞIT VE KIRTASİYE', '17.23.06', '', 0),
(107, 'KAĞIT VE KIRTASİYE', '17.23.07', '', 0),
(108, 'KAĞIT VE KIRTASİYE', '17.23.08', '', 0),
(109, 'KAĞIT VE KIRTASİYE', '17.23.09', '', 0),
(110, 'KAĞIT VE KIRTASİYE', '17.24.02', '', 0),
(111, 'KAĞIT VE KIRTASİYE', '17.24.03', '', 0),
(112, 'KAĞIT VE KIRTASİYE', '17.29.01', '', 0),
(113, 'KAĞIT VE KIRTASİYE', '17.29.02', '', 0),
(114, 'KAĞIT VE KIRTASİYE', '17.29.03', '', 0),
(115, 'KAĞIT VE KIRTASİYE', '17.29.04', '', 0),
(116, 'KAĞIT VE KIRTASİYE', '23.99.07', '', 0),
(117, 'KAĞIT VE KIRTASİYE', '46.18.04', '', 0),
(118, 'KAĞIT VE KIRTASİYE', '46.49.03', '', 0),
(119, 'KAĞIT VE KIRTASİYE', '46.76.02', '', 0),
(120, 'KAĞIT VE KIRTASİYE', '47.59.12', '', 0),
(121, 'KAĞIT VE KIRTASİYE', '47.62.01', '', 0),
(122, 'KOZMETİK', '20.42.01', '', 0),
(123, 'KOZMETİK', '20.42.02', '', 0),
(124, 'KOZMETİK', '20.42.03', '', 0),
(125, 'KOZMETİK', '20.42.04', '', 0),
(126, 'KOZMETİK', '20.59.06', '', 0),
(127, 'KOZMETİK', '32.91.03', '', 0),
(128, 'KOZMETİK', '32.99.06', '', 0),
(129, 'KOZMETİK', '46.18.02', '', 0),
(130, 'KOZMETİK', '46.45.01', '', 0),
(131, 'KOZMETİK', '46.45.02', '', 0),
(132, 'KOZMETİK', '47.75.01', '', 0),
(133, 'KOZMETİK', '47.89.09', '', 0),
(134, 'KOZMETİK', '96.02.01', '', 0),
(135, 'KOZMETİK', '96.02.02', '', 0),
(136, 'KOZMETİK', '96.02.03', '', 0),
(137, 'KOZMETİK', '96.02.04', '', 0),
(138, 'KOZMETİK', '96.02.05', '', 0),
(139, 'İLAÇ VE TIBBİ CİHAZ', '21.10.01', '', 0),
(140, 'İLAÇ VE TIBBİ CİHAZ', '21.20.01', '', 0),
(141, 'İLAÇ VE TIBBİ CİHAZ', '21.20.02', '', 0),
(142, 'İLAÇ VE TIBBİ CİHAZ', '21.20.03', '', 0),
(143, 'İLAÇ VE TIBBİ CİHAZ', '21.20.04', '', 0),
(144, 'İLAÇ VE TIBBİ CİHAZ', '23.19.06', '', 0),
(145, 'İLAÇ VE TIBBİ CİHAZ', '26.60.01', '', 0),
(146, 'İLAÇ VE TIBBİ CİHAZ', '32.50.02', '', 0),
(147, 'İLAÇ VE TIBBİ CİHAZ', '32.50.03', '', 0),
(148, 'İLAÇ VE TIBBİ CİHAZ', '32.50.04', '', 0),
(149, 'İLAÇ VE TIBBİ CİHAZ', '32.50.06', '', 0),
(150, 'İLAÇ VE TIBBİ CİHAZ', '32.50.07', '', 0),
(151, 'İLAÇ VE TIBBİ CİHAZ', '32.50.09', '', 0),
(152, 'İLAÇ VE TIBBİ CİHAZ', '32.50.10', '', 0),
(153, 'İLAÇ VE TIBBİ CİHAZ', '32.50.11', '', 0),
(154, 'İLAÇ VE TIBBİ CİHAZ', '32.50.12', '', 0),
(155, 'İLAÇ VE TIBBİ CİHAZ', '32.50.13', '', 0),
(156, 'İLAÇ VE TIBBİ CİHAZ', '32.50.90', '', 0),
(157, 'İLAÇ VE TIBBİ CİHAZ', '33.20.50', '', 0),
(158, 'İLAÇ VE TIBBİ CİHAZ', '46.18.03', '', 0),
(159, 'İLAÇ VE TIBBİ CİHAZ', '46.18.05', '', 0),
(160, 'İLAÇ VE TIBBİ CİHAZ', '46.46.01', '', 0),
(161, 'İLAÇ VE TIBBİ CİHAZ', '46.46.02', '', 0),
(162, 'İLAÇ VE TIBBİ CİHAZ', '46.46.03', '', 0),
(163, 'İLAÇ VE TIBBİ CİHAZ', '46.46.04', '', 0),
(164, 'İLAÇ VE TIBBİ CİHAZ', '47.73.01', '', 0),
(165, 'İLAÇ VE TIBBİ CİHAZ', '47.73.02', '', 0),
(166, 'İLAÇ VE TIBBİ CİHAZ', '47.74.01', '', 0),
(167, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '10.41.02', '', 0),
(168, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '10.41.05', '', 0),
(169, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '10.41.07', '', 0),
(170, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '10.42.01', '', 0),
(171, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '10.83.04', '', 0),
(172, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '10.84.01', '', 0),
(173, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '10.84.02', '', 0),
(174, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '10.84.03', '', 0),
(175, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '10.84.05', '', 0),
(176, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '10.86.01', '', 0),
(177, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '10.86.02', '', 0),
(178, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '10.86.03', '', 0),
(179, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '10.89.01', '', 0),
(180, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '10.89.02', '', 0),
(181, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '10.89.04', '', 0),
(182, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '10.89.05', '', 0),
(183, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '10.89.06', '', 0),
(184, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '11.01.01', '', 0),
(185, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '11.01.02', '', 0),
(186, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '11.01.03', '', 0),
(187, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '11.02.01', '', 0),
(188, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '11.02.02', '', 0),
(189, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '11.03.01', '', 0),
(190, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '11.04.02', '', 0),
(191, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '11.05.01', '', 0),
(192, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '11.06.01', '', 0),
(193, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '11.07.01', '', 0),
(194, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '11.07.02', '', 0),
(195, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '11.07.03', '', 0),
(196, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '35.30.22', '', 0),
(197, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '46.17.01', '', 0),
(198, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '46.17.03', '', 0),
(199, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '46.17.04', '', 0),
(200, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '46.33.03', '', 0),
(201, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '46.34.01', '', 0),
(202, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '46.34.02', '', 0),
(203, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '46.34.03', '', 0),
(204, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '46.35.01', '', 0),
(205, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '46.36.03', '', 0),
(206, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '46.36.04', '', 0),
(207, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '46.37.01', '', 0),
(208, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '46.37.02', '', 0),
(209, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '46.37.03', '', 0),
(210, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '46.38.03', '', 0),
(211, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '46.38.05', '', 0),
(212, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '46.38.06', '', 0),
(213, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '46.39.01', '', 0),
(214, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '46.39.02', '', 0),
(215, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '46.44.02', '', 0),
(216, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '47.29.02', '', 0),
(217, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '47.29.03', '', 0),
(218, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '47.29.12', '', 0),
(219, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '47.29.90', '', 0),
(220, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '47.78.15', '', 0),
(221, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '47.81.01', '', 0),
(222, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '47.81.05', '', 0),
(223, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '47.81.09', '', 0),
(224, 'TOPTAN GIDA VE TEMİZLİK ÜRÜNLERİ', '47.89.12', '', 0),
(225, 'CAM VE CAM ÜRÜNLERİ', '23.11.01', '', 0),
(226, 'CAM VE CAM ÜRÜNLERİ', '23.12.01', '', 0),
(227, 'CAM VE CAM ÜRÜNLERİ', '23.12.02', '', 0),
(228, 'CAM VE CAM ÜRÜNLERİ', '23.12.03', '', 0),
(229, 'CAM VE CAM ÜRÜNLERİ', '23.12.04', '', 0),
(230, 'CAM VE CAM ÜRÜNLERİ', '23.14.01', '', 0),
(231, 'CAM VE CAM ÜRÜNLERİ', '23.19.01', '', 0),
(232, 'CAM VE CAM ÜRÜNLERİ', '23.19.05', '', 0),
(233, 'CAM VE CAM ÜRÜNLERİ', '23.19.07', '', 0),
(234, 'CAM VE CAM ÜRÜNLERİ', '23.19.08', '', 0),
(235, 'CAM VE CAM ÜRÜNLERİ', '23.19.90', '', 0),
(236, 'CAM VE CAM ÜRÜNLERİ', '46.73.03', '', 0),
(237, 'CAM VE CAM ÜRÜNLERİ', '47.52.04', '', 0),
(238, 'CAM VE CAM ÜRÜNLERİ', '47.89.02', '', 0),
(239, 'PEYZAJ VE ÇİÇEKÇİLİK', '01.14.01', '', 0),
(240, 'PEYZAJ VE ÇİÇEKÇİLİK', '01.15.01', '', 0),
(241, 'PEYZAJ VE ÇİÇEKÇİLİK', '01.16.02', '', 0),
(242, 'PEYZAJ VE ÇİÇEKÇİLİK', '01.16.90', '', 0),
(243, 'PEYZAJ VE ÇİÇEKÇİLİK', '01.19.01', '', 0),
(244, 'PEYZAJ VE ÇİÇEKÇİLİK', '01.19.02', '', 0),
(245, 'PEYZAJ VE ÇİÇEKÇİLİK', '01.19.90', '', 0),
(246, 'PEYZAJ VE ÇİÇEKÇİLİK', '01.27.02', '', 0),
(247, 'PEYZAJ VE ÇİÇEKÇİLİK', '01.27.90', '', 0),
(248, 'PEYZAJ VE ÇİÇEKÇİLİK', '01.28.01', '', 0),
(249, 'PEYZAJ VE ÇİÇEKÇİLİK', '01.29.01', '', 0),
(250, 'PEYZAJ VE ÇİÇEKÇİLİK', '01.30.03', '', 0),
(251, 'PEYZAJ VE ÇİÇEKÇİLİK', '01.30.04', '', 0),
(252, 'PEYZAJ VE ÇİÇEKÇİLİK', '01.61.01', '', 0),
(253, 'PEYZAJ VE ÇİÇEKÇİLİK', '01.61.02', '', 0),
(254, 'PEYZAJ VE ÇİÇEKÇİLİK', '01.61.03', '', 0),
(255, 'PEYZAJ VE ÇİÇEKÇİLİK', '01.61.04', '', 0),
(256, 'PEYZAJ VE ÇİÇEKÇİLİK', '01.61.05', '', 0),
(257, 'PEYZAJ VE ÇİÇEKÇİLİK', '01.61.06', '', 0),
(258, 'PEYZAJ VE ÇİÇEKÇİLİK', '01.63.01', '', 0),
(259, 'PEYZAJ VE ÇİÇEKÇİLİK', '01.63.03', '', 0),
(260, 'PEYZAJ VE ÇİÇEKÇİLİK', '01.63.05', '', 0),
(261, 'PEYZAJ VE ÇİÇEKÇİLİK', '01.63.07', '', 0),
(262, 'PEYZAJ VE ÇİÇEKÇİLİK', '01.63.90', '', 0),
(263, 'PEYZAJ VE ÇİÇEKÇİLİK', '01.64.01', '', 0),
(264, 'PEYZAJ VE ÇİÇEKÇİLİK', '02.10.02', '', 0),
(265, 'PEYZAJ VE ÇİÇEKÇİLİK', '02.10.03', '', 0),
(266, 'PEYZAJ VE ÇİÇEKÇİLİK', '02.30.01', '', 0),
(267, 'PEYZAJ VE ÇİÇEKÇİLİK', '02.40.03', '', 0),
(268, 'PEYZAJ VE ÇİÇEKÇİLİK', '02.40.04', '', 0),
(269, 'PEYZAJ VE ÇİÇEKÇİLİK', '02.40.05', '', 0),
(270, 'PEYZAJ VE ÇİÇEKÇİLİK', '02.40.06', '', 0),
(271, 'PEYZAJ VE ÇİÇEKÇİLİK', '02.40.07', '', 0),
(272, 'PEYZAJ VE ÇİÇEKÇİLİK', '12.00.04', '', 0),
(273, 'PEYZAJ VE ÇİÇEKÇİLİK', '46.11.01', '', 0),
(274, 'PEYZAJ VE ÇİÇEKÇİLİK', '46.21.04', '', 0),
(275, 'PEYZAJ VE ÇİÇEKÇİLİK', '46.21.90', '', 0),
(276, 'PEYZAJ VE ÇİÇEKÇİLİK', '46.22.01', '', 0),
(277, 'PEYZAJ VE ÇİÇEKÇİLİK', '47.76.02', '', 0),
(278, 'PEYZAJ VE ÇİÇEKÇİLİK', '47.81.06', '', 0),
(279, 'PEYZAJ VE ÇİÇEKÇİLİK', '47.89.04', '', 0),
(280, 'PEYZAJ VE ÇİÇEKÇİLİK', '81.30.01', '', 0),
(281, 'PEYZAJ VE ÇİÇEKÇİLİK', '81.30.05', '', 0),
(282, 'PEYZAJ VE ÇİÇEKÇİLİK', '81.30.90', '', 0),
(283, 'EKMEK, UN VE UNLU MAMÜLLER', '10.31.01', '', 0),
(284, 'EKMEK, UN VE UNLU MAMÜLLER', '10.31.02', '', 0),
(285, 'EKMEK, UN VE UNLU MAMÜLLER', '10.39.07', '', 0),
(286, 'EKMEK, UN VE UNLU MAMÜLLER', '10.41.01', '', 0),
(287, 'EKMEK, UN VE UNLU MAMÜLLER', '10.61.01', '', 0),
(288, 'EKMEK, UN VE UNLU MAMÜLLER', '10.61.02', '', 0),
(289, 'EKMEK, UN VE UNLU MAMÜLLER', '10.61.05', '', 0),
(290, 'EKMEK, UN VE UNLU MAMÜLLER', '10.61.06', '', 0),
(291, 'EKMEK, UN VE UNLU MAMÜLLER', '10.61.07', '', 0),
(292, 'EKMEK, UN VE UNLU MAMÜLLER', '10.61.08', '', 0),
(293, 'EKMEK, UN VE UNLU MAMÜLLER', '10.61.09', '', 0),
(294, 'EKMEK, UN VE UNLU MAMÜLLER', '10.61.10', '', 0),
(295, 'EKMEK, UN VE UNLU MAMÜLLER', '10.62.01', '', 0),
(296, 'EKMEK, UN VE UNLU MAMÜLLER', '10.62.02', '', 0),
(297, 'EKMEK, UN VE UNLU MAMÜLLER', '10.62.04', '', 0),
(298, 'EKMEK, UN VE UNLU MAMÜLLER', '10.62.05', '', 0),
(299, 'EKMEK, UN VE UNLU MAMÜLLER', '10.62.06', '', 0),
(300, 'EKMEK, UN VE UNLU MAMÜLLER', '10.71.02', '', 0),
(301, 'EKMEK, UN VE UNLU MAMÜLLER', '10.73.03', '', 0),
(302, 'EKMEK, UN VE UNLU MAMÜLLER', '46.36.02', '', 0),
(303, 'EKMEK, UN VE UNLU MAMÜLLER', '46.38.04', '', 0),
(304, 'EKMEK, UN VE UNLU MAMÜLLER', '47.24.01', '', 0),
(305, 'EKMEK, UN VE UNLU MAMÜLLER', '47.81.10', '', 0),
(306, 'MEYVE VE SEBZE', '01.13.17', '', 0),
(307, 'MEYVE VE SEBZE', '01.13.18', '', 0),
(308, 'MEYVE VE SEBZE', '01.13.19', '', 0),
(309, 'MEYVE VE SEBZE', '01.13.20', '', 0),
(310, 'MEYVE VE SEBZE', '01.13.21', '', 0),
(311, 'MEYVE VE SEBZE', '01.13.22', '', 0),
(312, 'MEYVE VE SEBZE', '01.13.23', '', 0),
(313, 'MEYVE VE SEBZE', '01.21.05', '', 0),
(314, 'MEYVE VE SEBZE', '01.22.05', '', 0),
(315, 'MEYVE VE SEBZE', '01.23.02', '', 0),
(316, 'MEYVE VE SEBZE', '01.24.04', '', 0),
(317, 'MEYVE VE SEBZE', '01.25.08', '', 0),
(318, 'MEYVE VE SEBZE', '01.26.02', '', 0),
(319, 'MEYVE VE SEBZE', '01.26.90', '', 0),
(320, 'MEYVE VE SEBZE', '01.63.04', '', 0),
(321, 'MEYVE VE SEBZE', '01.63.06', '', 0),
(322, 'MEYVE VE SEBZE', '10.32.01', '', 0),
(323, 'MEYVE VE SEBZE', '10.32.02', '', 0),
(324, 'MEYVE VE SEBZE', '10.39.01', '', 0),
(325, 'MEYVE VE SEBZE', '10.39.04', '', 0),
(326, 'MEYVE VE SEBZE', '10.39.05', '', 0),
(327, 'MEYVE VE SEBZE', '10.39.90', '', 0),
(328, 'MEYVE VE SEBZE', '46.17.02', '', 0),
(329, 'MEYVE VE SEBZE', '46.31.02', '', 0),
(330, 'MEYVE VE SEBZE', '46.31.03', '', 0),
(331, 'MEYVE VE SEBZE', '46.31.04', '', 0),
(332, 'MEYVE VE SEBZE', '46.31.05', '', 0),
(333, 'MEYVE VE SEBZE', '46.31.06', '', 0),
(334, 'MEYVE VE SEBZE', '46.31.90', '', 0),
(335, 'MEYVE VE SEBZE', '47.21.01', '', 0),
(336, 'MEYVE VE SEBZE', '47.21.02', '', 0),
(337, 'MEYVE VE SEBZE', '47.21.03', '', 0),
(338, 'MEYVE VE SEBZE', '47.81.02', '', 0),
(339, 'HAYVANSAL GIDA ÜRÜNLERİ', '01.41.31', '', 0),
(340, 'HAYVANSAL GIDA ÜRÜNLERİ', '01.43.01', '', 0),
(341, 'HAYVANSAL GIDA ÜRÜNLERİ', '01.47.02', '', 0),
(342, 'HAYVANSAL GIDA ÜRÜNLERİ', '01.47.03', '', 0),
(343, 'HAYVANSAL GIDA ÜRÜNLERİ', '01.49.01', '', 0),
(344, 'HAYVANSAL GIDA ÜRÜNLERİ', '01.49.02', '', 0),
(345, 'HAYVANSAL GIDA ÜRÜNLERİ', '01.49.03', '', 0),
(346, 'HAYVANSAL GIDA ÜRÜNLERİ', '01.49.90', '', 0),
(347, 'HAYVANSAL GIDA ÜRÜNLERİ', '01.50.06', '', 0),
(348, 'HAYVANSAL GIDA ÜRÜNLERİ', '01.62.01', '', 0),
(349, 'HAYVANSAL GIDA ÜRÜNLERİ', '01.62.02', '', 0),
(350, 'HAYVANSAL GIDA ÜRÜNLERİ', '03.11.01', '', 0),
(351, 'HAYVANSAL GIDA ÜRÜNLERİ', '03.11.02', '', 0),
(352, 'HAYVANSAL GIDA ÜRÜNLERİ', '03.12.01', '', 0),
(353, 'HAYVANSAL GIDA ÜRÜNLERİ', '03.21.01', '', 0),
(354, 'HAYVANSAL GIDA ÜRÜNLERİ', '03.21.02', '', 0),
(355, 'HAYVANSAL GIDA ÜRÜNLERİ', '03.22.01', '', 0),
(356, 'HAYVANSAL GIDA ÜRÜNLERİ', '03.22.02', '', 0),
(357, 'HAYVANSAL GIDA ÜRÜNLERİ', '10.12.04', '', 0),
(358, 'HAYVANSAL GIDA ÜRÜNLERİ', '10.20.03', '', 0),
(359, 'HAYVANSAL GIDA ÜRÜNLERİ', '10.20.04', '', 0),
(360, 'HAYVANSAL GIDA ÜRÜNLERİ', '10.20.05', '', 0),
(361, 'HAYVANSAL GIDA ÜRÜNLERİ', '10.20.06', '', 0),
(362, 'HAYVANSAL GIDA ÜRÜNLERİ', '10.20.07', '', 0),
(363, 'HAYVANSAL GIDA ÜRÜNLERİ', '10.20.08', '', 0),
(364, 'HAYVANSAL GIDA ÜRÜNLERİ', '10.41.10', '', 0),
(365, 'HAYVANSAL GIDA ÜRÜNLERİ', '10.41.11', '', 0),
(366, 'HAYVANSAL GIDA ÜRÜNLERİ', '10.51.01', '', 0),
(367, 'HAYVANSAL GIDA ÜRÜNLERİ', '10.51.02', '', 0),
(368, 'HAYVANSAL GIDA ÜRÜNLERİ', '10.51.03', '', 0),
(369, 'HAYVANSAL GIDA ÜRÜNLERİ', '10.51.04', '', 0),
(370, 'HAYVANSAL GIDA ÜRÜNLERİ', '10.51.05', '', 0),
(371, 'HAYVANSAL GIDA ÜRÜNLERİ', '10.52.01', '', 0),
(372, 'HAYVANSAL GIDA ÜRÜNLERİ', '10.52.02', '', 0),
(373, 'HAYVANSAL GIDA ÜRÜNLERİ', '10.91.01', '', 0),
(374, 'HAYVANSAL GIDA ÜRÜNLERİ', '10.92.01', '', 0),
(375, 'HAYVANSAL GIDA ÜRÜNLERİ', '46.21.01', '', 0),
(376, 'HAYVANSAL GIDA ÜRÜNLERİ', '46.33.01', '', 0),
(377, 'HAYVANSAL GIDA ÜRÜNLERİ', '46.33.02', '', 0),
(378, 'HAYVANSAL GIDA ÜRÜNLERİ', '46.38.01', '', 0),
(379, 'HAYVANSAL GIDA ÜRÜNLERİ', '46.38.02', '', 0),
(380, 'HAYVANSAL GIDA ÜRÜNLERİ', '46.49.25', '', 0),
(381, 'HAYVANSAL GIDA ÜRÜNLERİ', '47.23.01', '', 0),
(382, 'HAYVANSAL GIDA ÜRÜNLERİ', '47.29.01', '', 0),
(383, 'HAYVANSAL GIDA ÜRÜNLERİ', '47.29.11', '', 0),
(384, 'HAYVANSAL GIDA ÜRÜNLERİ', '47.81.04', '', 0),
(385, 'HAYVANSAL GIDA ÜRÜNLERİ', '47.81.07', '', 0),
(386, 'HAYVANSAL GIDA ÜRÜNLERİ', '47.81.08', '', 0),
(387, 'HAYVANSAL GIDA ÜRÜNLERİ', '47.89.06', '', 0),
(388, 'EĞİTİM', '85.10.01', '', 0),
(389, 'EĞİTİM', '85.10.02', '', 0),
(390, 'EĞİTİM', '85.20.06', '', 0),
(391, 'EĞİTİM', '85.20.07', '', 0),
(392, 'EĞİTİM', '85.20.08', '', 0),
(393, 'EĞİTİM', '85.20.09', '', 0),
(394, 'EĞİTİM', '85.31.12', '', 0),
(395, 'EĞİTİM', '85.31.13', '', 0),
(396, 'EĞİTİM', '85.31.14', '', 0),
(397, 'EĞİTİM', '85.31.16', '', 0),
(398, 'EĞİTİM', '85.32.10', '', 0),
(399, 'EĞİTİM', '85.32.11', '', 0),
(400, 'EĞİTİM', '85.32.12', '', 0),
(401, 'EĞİTİM', '85.32.13', '', 0),
(402, 'EĞİTİM', '85.32.14', '', 0),
(403, 'EĞİTİM', '85.32.15', '', 0),
(404, 'EĞİTİM', '85.32.16', '', 0),
(405, 'EĞİTİM', '85.32.90', '', 0),
(406, 'EĞİTİM', '85.41.01', '', 0),
(407, 'EĞİTİM', '85.42.01', '', 0),
(408, 'EĞİTİM', '85.42.03', '', 0),
(409, 'EĞİTİM', '85.51.03', '', 0),
(410, 'EĞİTİM', '85.52.05', '', 0),
(411, 'EĞİTİM', '85.53.01', '', 0),
(412, 'EĞİTİM', '85.59.01', '', 0),
(413, 'EĞİTİM', '85.59.03', '', 0),
(414, 'EĞİTİM', '85.59.05', '', 0),
(415, 'EĞİTİM', '85.59.06', '', 0),
(416, 'EĞİTİM', '85.59.08', '', 0),
(417, 'EĞİTİM', '85.59.09', '', 0),
(418, 'EĞİTİM', '85.59.10', '', 0),
(419, 'EĞİTİM', '85.59.12', '', 0),
(420, 'EĞİTİM', '85.59.15', '', 0),
(421, 'EĞİTİM', '85.59.90', '', 0),
(422, 'EĞİTİM', '85.60.02', '', 0),
(423, 'OTELLER', '55.10.02', '', 0),
(424, 'OTELLER', '55.10.05', '', 0),
(425, 'OTELLER', '55.20.01', '', 0),
(426, 'OTELLER', '55.20.03', '', 0),
(427, 'OTELLER', '55.20.04', '', 0),
(428, 'OTELLER', '55.30.36', '', 0),
(429, 'OTELLER', '55.90.01', '', 0),
(430, 'OTELLER', '55.90.02', '', 0),
(431, 'OTELLER', '55.90.03', '', 0),
(432, 'OTELLER', '56.30.04', '', 0),
(433, 'OTELLER', '56.30.05', '', 0),
(434, 'RESTORAN VE YİYECEK İÇECEK HİZMETLERİ', '10.85.01', '', 0),
(435, 'RESTORAN VE YİYECEK İÇECEK HİZMETLERİ', '56.10.01', '', 0),
(436, 'RESTORAN VE YİYECEK İÇECEK HİZMETLERİ', '56.10.02', '', 0),
(437, 'RESTORAN VE YİYECEK İÇECEK HİZMETLERİ', '56.10.03', '', 0),
(438, 'RESTORAN VE YİYECEK İÇECEK HİZMETLERİ', '56.10.04', '', 0),
(439, 'RESTORAN VE YİYECEK İÇECEK HİZMETLERİ', '56.10.05', '', 0),
(440, 'RESTORAN VE YİYECEK İÇECEK HİZMETLERİ', '56.10.06', '', 0),
(441, 'RESTORAN VE YİYECEK İÇECEK HİZMETLERİ', '56.10.07', '', 0),
(442, 'RESTORAN VE YİYECEK İÇECEK HİZMETLERİ', '56.10.08', '', 0),
(443, 'RESTORAN VE YİYECEK İÇECEK HİZMETLERİ', '56.10.10', '', 0),
(444, 'RESTORAN VE YİYECEK İÇECEK HİZMETLERİ', '56.10.14', '', 0),
(445, 'RESTORAN VE YİYECEK İÇECEK HİZMETLERİ', '56.10.17', '', 0),
(446, 'RESTORAN VE YİYECEK İÇECEK HİZMETLERİ', '56.10.18', '', 0),
(447, 'RESTORAN VE YİYECEK İÇECEK HİZMETLERİ', '56.10.19', '', 0),
(448, 'RESTORAN VE YİYECEK İÇECEK HİZMETLERİ', '56.21.01', '', 0),
(449, 'RESTORAN VE YİYECEK İÇECEK HİZMETLERİ', '56.29.01', '', 0),
(450, 'RESTORAN VE YİYECEK İÇECEK HİZMETLERİ', '56.29.03', '', 0),
(451, 'RESTORAN VE YİYECEK İÇECEK HİZMETLERİ', '56.29.90', '', 0),
(452, 'RESTORAN VE YİYECEK İÇECEK HİZMETLERİ', '56.30.02', '', 0),
(453, 'RESTORAN VE YİYECEK İÇECEK HİZMETLERİ', '56.30.03', '', 0),
(454, 'RESTORAN VE YİYECEK İÇECEK HİZMETLERİ', '56.30.06', '', 0),
(455, 'RESTORAN VE YİYECEK İÇECEK HİZMETLERİ', '56.30.08', '', 0),
(456, 'RESTORAN VE YİYECEK İÇECEK HİZMETLERİ', '56.30.90', '', 0),
(457, 'FİNANS KURULUŞLARI', '64.11.06', '', 0),
(458, 'FİNANS KURULUŞLARI', '64.19.01', '', 0),
(459, 'FİNANS KURULUŞLARI', '64.20.19', '', 0),
(460, 'FİNANS KURULUŞLARI', '64.30.01', '', 0),
(461, 'FİNANS KURULUŞLARI', '64.91.01', '', 0),
(462, 'FİNANS KURULUŞLARI', '64.92.01', '', 0),
(463, 'FİNANS KURULUŞLARI', '64.92.04', '', 0),
(464, 'FİNANS KURULUŞLARI', '64.92.07', '', 0),
(465, 'FİNANS KURULUŞLARI', '64.92.08', '', 0),
(466, 'FİNANS KURULUŞLARI', '64.99.01', '', 0),
(467, 'FİNANS KURULUŞLARI', '64.99.03', '', 0),
(468, 'FİNANS KURULUŞLARI', '64.99.08', '', 0),
(469, 'FİNANS KURULUŞLARI', '64.99.09', '', 0),
(470, 'FİNANS KURULUŞLARI', '64.99.10', '', 0),
(471, 'FİNANS KURULUŞLARI', '64.99.90', '', 0),
(472, 'FİNANS KURULUŞLARI', '66.11.02', '', 0),
(473, 'FİNANS KURULUŞLARI', '66.12.01', '', 0),
(474, 'FİNANS KURULUŞLARI', '66.12.04', '', 0),
(475, 'FİNANS KURULUŞLARI', '66.12.06', '', 0),
(476, 'FİNANS KURULUŞLARI', '66.12.08', '', 0),
(477, 'FİNANS KURULUŞLARI', '66.13.01', '', 0),
(478, 'FİNANS KURULUŞLARI', '66.19.02', '', 0),
(479, 'FİNANS KURULUŞLARI', '66.19.03', '', 0),
(480, 'FİNANS KURULUŞLARI', '66.19.04', '', 0),
(481, 'FİNANS KURULUŞLARI', '66.19.05', '', 0),
(482, 'FİNANS KURULUŞLARI', '66.19.06', '', 0),
(483, 'FİNANS KURULUŞLARI', '66.19.90', '', 0),
(484, 'FİNANS KURULUŞLARI', '66.30.02', '', 0),
(485, 'MALİ MÜŞAVİRLİK', '69.20.01', '', 0),
(486, 'MALİ MÜŞAVİRLİK', '69.20.02', '', 0),
(487, 'MALİ MÜŞAVİRLİK', '69.20.03', '', 0),
(488, 'MALİ MÜŞAVİRLİK', '69.20.04', '', 0),
(489, 'MALİ MÜŞAVİRLİK', '69.20.05', '', 0),
(490, 'SİGORTACILIK', '65.11.02', '', 0),
(491, 'SİGORTACILIK', '65.12.13', '', 0),
(492, 'SİGORTACILIK', '65.20.01', '', 0),
(493, 'SİGORTACILIK', '65.30.01', '', 0),
(494, 'SİGORTACILIK', '66.21.01', '', 0),
(495, 'SİGORTACILIK', '66.22.01', '', 0),
(496, 'SİGORTACILIK', '66.22.02', '', 0),
(497, 'SİGORTACILIK', '66.29.01', '', 0),
(498, 'SİGORTACILIK', '66.29.90', '', 0),
(499, 'EMLAK MÜŞAVİRLERİ', '68.10.01', '', 0),
(500, 'EMLAK MÜŞAVİRLERİ', '68.20.02', '', 0),
(501, 'EMLAK MÜŞAVİRLERİ', '68.31.01', '', 0),
(502, 'EMLAK MÜŞAVİRLERİ', '68.31.02', '', 0),
(503, 'EMLAK MÜŞAVİRLERİ', '68.32.02', '', 0),
(504, 'EMLAK MÜŞAVİRLERİ', '68.32.03', '', 0),
(505, 'EMLAK MÜŞAVİRLERİ', '68.32.04', '', 0),
(506, 'ŞEHİRİÇİ YOLCU TAŞIMACILIĞI', '49.31.01', '', 0),
(507, 'ŞEHİRİÇİ YOLCU TAŞIMACILIĞI', '49.31.04', '', 0),
(508, 'ŞEHİRİÇİ YOLCU TAŞIMACILIĞI', '49.31.05', '', 0),
(509, 'ŞEHİRİÇİ YOLCU TAŞIMACILIĞI', '49.31.06', '', 0),
(510, 'ŞEHİRİÇİ YOLCU TAŞIMACILIĞI', '49.31.90', '', 0),
(511, 'ŞEHİRİÇİ YOLCU TAŞIMACILIĞI', '49.32.01', '', 0),
(512, 'ŞEHİRİÇİ YOLCU TAŞIMACILIĞI', '49.39.02', '', 0),
(513, 'ŞEHİRİÇİ YOLCU TAŞIMACILIĞI', '49.39.03', '', 0),
(514, 'ŞEHİRİÇİ YOLCU TAŞIMACILIĞI', '49.39.08', '', 0),
(515, 'ŞEHİRİÇİ YOLCU TAŞIMACILIĞI', '52.21.10', '', 0),
(516, 'YOLCU TAŞIMACILIĞI VE SEYAHAT ACENTELERİ', '49.10.01', '', 0),
(517, 'YOLCU TAŞIMACILIĞI VE SEYAHAT ACENTELERİ', '49.39.01', '', 0),
(518, 'YOLCU TAŞIMACILIĞI VE SEYAHAT ACENTELERİ', '49.39.04', '', 0),
(519, 'YOLCU TAŞIMACILIĞI VE SEYAHAT ACENTELERİ', '49.39.90', '', 0),
(520, 'YOLCU TAŞIMACILIĞI VE SEYAHAT ACENTELERİ', '50.10.12', '', 0),
(521, 'YOLCU TAŞIMACILIĞI VE SEYAHAT ACENTELERİ', '50.10.13', '', 0),
(522, 'YOLCU TAŞIMACILIĞI VE SEYAHAT ACENTELERİ', '50.10.14', '', 0),
(523, 'YOLCU TAŞIMACILIĞI VE SEYAHAT ACENTELERİ', '50.10.15', '', 0),
(524, 'YOLCU TAŞIMACILIĞI VE SEYAHAT ACENTELERİ', '50.10.16', '', 0),
(525, 'YOLCU TAŞIMACILIĞI VE SEYAHAT ACENTELERİ', '50.10.90', '', 0),
(526, 'YOLCU TAŞIMACILIĞI VE SEYAHAT ACENTELERİ', '50.30.08', '', 0),
(527, 'YOLCU TAŞIMACILIĞI VE SEYAHAT ACENTELERİ', '50.30.09', '', 0),
(528, 'YOLCU TAŞIMACILIĞI VE SEYAHAT ACENTELERİ', '51.10.01', '', 0),
(529, 'YOLCU TAŞIMACILIĞI VE SEYAHAT ACENTELERİ', '51.10.02', '', 0),
(530, 'YOLCU TAŞIMACILIĞI VE SEYAHAT ACENTELERİ', '51.10.03', '', 0),
(531, 'YOLCU TAŞIMACILIĞI VE SEYAHAT ACENTELERİ', '52.21.09', '', 0),
(532, 'YOLCU TAŞIMACILIĞI VE SEYAHAT ACENTELERİ', '52.21.13', '', 0),
(533, 'YOLCU TAŞIMACILIĞI VE SEYAHAT ACENTELERİ', '79.11.01', '', 0),
(534, 'YOLCU TAŞIMACILIĞI VE SEYAHAT ACENTELERİ', '79.12.01', '', 0),
(535, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '49.20.01', '', 0),
(536, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '49.41.01', '', 0),
(537, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '49.41.02', '', 0),
(538, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '49.41.03', '', 0),
(539, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '49.41.05', '', 0),
(540, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '49.41.06', '', 0),
(541, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '49.41.07', '', 0),
(542, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '49.41.90', '', 0),
(543, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '49.42.01', '', 0),
(544, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '49.50.90', '', 0),
(545, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '50.20.18', '', 0),
(546, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '50.20.19', '', 0),
(547, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '50.20.20', '', 0),
(548, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '50.20.21', '', 0),
(549, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '50.20.22', '', 0),
(550, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '50.20.23', '', 0),
(551, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '50.20.26', '', 0),
(552, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '50.20.27', '', 0),
(553, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '50.20.28', '', 0),
(554, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '50.20.29', '', 0),
(555, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '50.20.90', '', 0),
(556, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '50.20.91', '', 0),
(557, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '50.40.05', '', 0),
(558, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '50.40.07', '', 0),
(559, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '50.40.08', '', 0),
(560, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '51.21.17', '', 0),
(561, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '51.22.02', '', 0),
(562, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '52.21.04', '', 0),
(563, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '52.21.05', '', 0),
(564, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '52.21.07', '', 0),
(565, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '52.21.08', '', 0),
(566, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '52.21.90', '', 0),
(567, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '52.22.06', '', 0),
(568, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '52.22.07', '', 0),
(569, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '52.22.08', '', 0),
(570, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '52.22.10', '', 0),
(571, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '52.22.90', '', 0),
(572, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '52.23.03', '', 0),
(573, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '52.23.04', '', 0),
(574, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '52.23.06', '', 0),
(575, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '52.23.07', '', 0),
(576, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '52.23.90', '', 0),
(577, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '52.29.05', '', 0),
(578, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '52.29.06', '', 0),
(579, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '52.29.07', '', 0),
(580, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '52.29.11', '', 0),
(581, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '52.29.13', '', 0),
(582, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '52.29.14', '', 0),
(583, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '52.29.15', '', 0),
(584, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '52.29.16', '', 0),
(585, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '52.29.17', '', 0),
(586, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '52.29.18', '', 0),
(587, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '52.29.90', '', 0),
(588, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '66.19.07', '', 0),
(589, 'TAŞIMACILIK VE LOJİSTİK HİZMETLERİ', '74.90.03', '', 0),
(590, 'GÜMRÜK MÜŞAVİRLİĞİ', '52.29.01', '', 0),
(591, 'GÜMRÜK MÜŞAVİRLİĞİ', '52.29.02', '', 0),
(592, 'GÜMRÜK MÜŞAVİRLİĞİ', '52.29.03', '', 0),
(593, 'GÜMRÜK MÜŞAVİRLİĞİ', '52.29.04', '', 0),
(594, 'GÜMRÜK MÜŞAVİRLİĞİ', '52.29.09', '', 0),
(595, 'TRAFİK MÜŞAVİRLİĞİ', '49.32.02', '', 0),
(596, 'TRAFİK MÜŞAVİRLİĞİ', '49.39.06', '', 0),
(597, 'TRAFİK MÜŞAVİRLİĞİ', '74.90.01', '', 0),
(598, 'TRAFİK MÜŞAVİRLİĞİ', '74.90.02', '', 0),
(599, 'TRAFİK MÜŞAVİRLİĞİ', '77.11.01', '', 0),
(600, 'TRAFİK MÜŞAVİRLİĞİ', '77.12.01', '', 0),
(601, 'TRAFİK MÜŞAVİRLİĞİ', '77.21.01', '', 0),
(602, 'TRAFİK MÜŞAVİRLİĞİ', '77.21.02', '', 0),
(603, 'TRAFİK MÜŞAVİRLİĞİ', '77.21.04', '', 0),
(604, 'TRAFİK MÜŞAVİRLİĞİ', '77.21.90', '', 0),
(605, 'TRAFİK MÜŞAVİRLİĞİ', '77.22.01', '', 0),
(606, 'TRAFİK MÜŞAVİRLİĞİ', '77.29.01', '', 0),
(607, 'TRAFİK MÜŞAVİRLİĞİ', '77.29.02', '', 0),
(608, 'TRAFİK MÜŞAVİRLİĞİ', '77.29.03', '', 0),
(609, 'TRAFİK MÜŞAVİRLİĞİ', '77.31.01', '', 0),
(610, 'TRAFİK MÜŞAVİRLİĞİ', '77.32.01', '', 0),
(611, 'TRAFİK MÜŞAVİRLİĞİ', '77.33.01', '', 0),
(612, 'TRAFİK MÜŞAVİRLİĞİ', '77.33.02', '', 0),
(613, 'TRAFİK MÜŞAVİRLİĞİ', '77.33.03', '', 0),
(614, 'TRAFİK MÜŞAVİRLİĞİ', '77.34.01', '', 0),
(615, 'TRAFİK MÜŞAVİRLİĞİ', '77.35.01', '', 0),
(616, 'TRAFİK MÜŞAVİRLİĞİ', '77.39.01', '', 0),
(617, 'TRAFİK MÜŞAVİRLİĞİ', '77.39.02', '', 0),
(618, 'TRAFİK MÜŞAVİRLİĞİ', '77.39.03', '', 0),
(619, 'TRAFİK MÜŞAVİRLİĞİ', '77.39.04', '', 0),
(620, 'TRAFİK MÜŞAVİRLİĞİ', '77.39.05', '', 0),
(621, 'TRAFİK MÜŞAVİRLİĞİ', '77.39.06', '', 0),
(622, 'TRAFİK MÜŞAVİRLİĞİ', '77.39.07', '', 0),
(623, 'TRAFİK MÜŞAVİRLİĞİ', '77.39.08', '', 0),
(624, 'TRAFİK MÜŞAVİRLİĞİ', '77.39.10', '', 0),
(625, 'TRAFİK MÜŞAVİRLİĞİ', '77.39.11', '', 0),
(626, 'TRAFİK MÜŞAVİRLİĞİ', '77.39.13', '', 0),
(627, 'TRAFİK MÜŞAVİRLİĞİ', '77.39.90', '', 0),
(628, 'TRAFİK MÜŞAVİRLİĞİ', '77.40.01', '', 0),
(629, 'TRAFİK MÜŞAVİRLİĞİ', '82.11.01', '', 0),
(630, 'TRAFİK MÜŞAVİRLİĞİ', '82.19.01', '', 0),
(631, 'TRAFİK MÜŞAVİRLİĞİ', '82.99.04', '', 0),
(632, 'TRAFİK MÜŞAVİRLİĞİ', '82.99.08', '', 0),
(633, 'AKARYAKIT', '06.10.01', '', 0),
(634, 'AKARYAKIT', '09.10.03', '', 0),
(635, 'AKARYAKIT', '46.71.01', '', 0),
(636, 'AKARYAKIT', '47.30.01', '', 0),
(637, 'AKARYAKIT', '47.30.02', '', 0),
(638, 'AKARYAKIT', '47.78.09', '', 0),
(639, 'AKARYAKIT', '49.41.08', '', 0),
(640, 'AKARYAKIT', '49.41.09', '', 0),
(641, 'AKARYAKIT', '49.41.10', '', 0),
(642, 'AKARYAKIT', '49.50.01', '', 0),
(643, 'AKARYAKIT', '49.50.03', '', 0),
(644, 'AKARYAKIT', '50.20.17', '', 0),
(645, 'AKARYAKIT', '50.20.24', '', 0),
(646, 'AKARYAKIT', '50.20.25', '', 0),
(647, 'AKARYAKIT', '50.20.30', '', 0),
(648, 'AKARYAKIT', '52.21.12', '', 0),
(649, 'İŞLETME DESTEK HİZMETLERİ', '69.10.01', '', 0),
(650, 'İŞLETME DESTEK HİZMETLERİ', '69.10.02', '', 0),
(651, 'İŞLETME DESTEK HİZMETLERİ', '69.10.03', '', 0),
(652, 'İŞLETME DESTEK HİZMETLERİ', '69.10.04', '', 0),
(653, 'İŞLETME DESTEK HİZMETLERİ', '69.10.07', '', 0),
(654, 'İŞLETME DESTEK HİZMETLERİ', '69.10.08', '', 0),
(655, 'İŞLETME DESTEK HİZMETLERİ', '69.10.09', '', 0),
(656, 'İŞLETME DESTEK HİZMETLERİ', '70.10.01', '', 0),
(657, 'İŞLETME DESTEK HİZMETLERİ', '70.22.02', '', 0),
(658, 'İŞLETME DESTEK HİZMETLERİ', '70.22.03', '', 0),
(659, 'İŞLETME DESTEK HİZMETLERİ', '74.90.04', '', 0),
(660, 'İŞLETME DESTEK HİZMETLERİ', '74.90.90', '', 0),
(661, 'İŞLETME DESTEK HİZMETLERİ', '78.10.01', '', 0),
(662, 'İŞLETME DESTEK HİZMETLERİ', '78.20.01', '', 0),
(663, 'İŞLETME DESTEK HİZMETLERİ', '78.30.03', '', 0),
(664, 'İŞLETME DESTEK HİZMETLERİ', '79.90.90', '', 0),
(665, 'İŞLETME DESTEK HİZMETLERİ', '80.10.05', '', 0),
(666, 'İŞLETME DESTEK HİZMETLERİ', '80.30.04', '', 0),
(667, 'İŞLETME DESTEK HİZMETLERİ', '80.30.05', '', 0),
(668, 'İŞLETME DESTEK HİZMETLERİ', '81.10.01', '', 0),
(669, 'İŞLETME DESTEK HİZMETLERİ', '81.21.01', '', 0),
(670, 'İŞLETME DESTEK HİZMETLERİ', '81.22.01', '', 0),
(671, 'İŞLETME DESTEK HİZMETLERİ', '81.29.02', '', 0),
(672, 'İŞLETME DESTEK HİZMETLERİ', '81.29.03', '', 0),
(673, 'İŞLETME DESTEK HİZMETLERİ', '81.29.04', '', 0),
(674, 'İŞLETME DESTEK HİZMETLERİ', '81.29.90', '', 0),
(675, 'İŞLETME DESTEK HİZMETLERİ', '82.19.03', '', 0),
(676, 'İŞLETME DESTEK HİZMETLERİ', '82.30.02', '', 0),
(677, 'İŞLETME DESTEK HİZMETLERİ', '82.91.01', '', 0),
(678, 'İŞLETME DESTEK HİZMETLERİ', '82.92.01', '', 0),
(679, 'İŞLETME DESTEK HİZMETLERİ', '82.92.05', '', 0),
(680, 'İŞLETME DESTEK HİZMETLERİ', '82.99.02', '', 0),
(681, 'İŞLETME DESTEK HİZMETLERİ', '82.99.05', '', 0),
(682, 'İŞLETME DESTEK HİZMETLERİ', '82.99.07', '', 0),
(683, 'İŞLETME DESTEK HİZMETLERİ', '82.99.90', '', 0),
(684, 'İŞLETME DESTEK HİZMETLERİ', '84.11.41', '', 0),
(685, 'İŞLETME DESTEK HİZMETLERİ', '84.11.42', '', 0),
(686, 'İŞLETME DESTEK HİZMETLERİ', '84.11.43', '', 0),
(687, 'İŞLETME DESTEK HİZMETLERİ', '84.11.44', '', 0),
(688, 'İŞLETME DESTEK HİZMETLERİ', '84.11.45', '', 0),
(689, 'İŞLETME DESTEK HİZMETLERİ', '84.11.46', '', 0),
(690, 'İŞLETME DESTEK HİZMETLERİ', '84.11.47', '', 0),
(691, 'İŞLETME DESTEK HİZMETLERİ', '84.11.48', '', 0),
(692, 'İŞLETME DESTEK HİZMETLERİ', '84.11.90', '', 0),
(693, 'İŞLETME DESTEK HİZMETLERİ', '84.12.11', '', 0),
(694, 'İŞLETME DESTEK HİZMETLERİ', '84.12.12', '', 0),
(695, 'İŞLETME DESTEK HİZMETLERİ', '84.12.13', '', 0),
(696, 'İŞLETME DESTEK HİZMETLERİ', '84.13.11', '', 0),
(697, 'İŞLETME DESTEK HİZMETLERİ', '84.13.12', '', 0),
(698, 'İŞLETME DESTEK HİZMETLERİ', '84.13.14', '', 0),
(699, 'İŞLETME DESTEK HİZMETLERİ', '84.13.15', '', 0),
(700, 'İŞLETME DESTEK HİZMETLERİ', '84.13.16', '', 0),
(701, 'İŞLETME DESTEK HİZMETLERİ', '84.13.17', '', 0),
(702, 'İŞLETME DESTEK HİZMETLERİ', '84.13.18', '', 0),
(703, 'İŞLETME DESTEK HİZMETLERİ', '84.21.05', '', 0),
(704, 'İŞLETME DESTEK HİZMETLERİ', '84.21.06', '', 0),
(705, 'İŞLETME DESTEK HİZMETLERİ', '84.22.05', '', 0),
(706, 'İŞLETME DESTEK HİZMETLERİ', '84.22.06', '', 0),
(707, 'İŞLETME DESTEK HİZMETLERİ', '84.23.04', '', 0),
(708, 'İŞLETME DESTEK HİZMETLERİ', '84.23.05', '', 0),
(709, 'İŞLETME DESTEK HİZMETLERİ', '84.23.06', '', 0),
(710, 'İŞLETME DESTEK HİZMETLERİ', '84.24.01', '', 0),
(711, 'İŞLETME DESTEK HİZMETLERİ', '84.25.01', '', 0),
(712, 'İŞLETME DESTEK HİZMETLERİ', '84.25.02', '', 0),
(713, 'İŞLETME DESTEK HİZMETLERİ', '84.30.01', '', 0),
(714, 'İŞLETME DESTEK HİZMETLERİ', '97.00.10', '', 0),
(715, 'İŞLETME DESTEK HİZMETLERİ', '98.10.01', '', 0),
(716, 'İŞLETME DESTEK HİZMETLERİ', '98.20.01', '', 0),
(717, 'İŞLETME DESTEK HİZMETLERİ', '99.00.15', '', 0),
(718, 'MİMARLIK VE MÜHENDİSLİK', '36.00.02', '', 0),
(719, 'MİMARLIK VE MÜHENDİSLİK', '36.00.03', '', 0),
(720, 'MİMARLIK VE MÜHENDİSLİK', '37.00.01', '', 0),
(721, 'MİMARLIK VE MÜHENDİSLİK', '38.11.01', '', 0),
(722, 'MİMARLIK VE MÜHENDİSLİK', '38.11.03', '', 0),
(723, 'MİMARLIK VE MÜHENDİSLİK', '38.12.01', '', 0),
(724, 'MİMARLIK VE MÜHENDİSLİK', '38.21.01', '', 0),
(725, 'MİMARLIK VE MÜHENDİSLİK', '38.22.01', '', 0),
(726, 'MİMARLIK VE MÜHENDİSLİK', '38.22.02', '', 0),
(727, 'MİMARLIK VE MÜHENDİSLİK', '38.31.01', '', 0),
(728, 'MİMARLIK VE MÜHENDİSLİK', '38.31.02', '', 0),
(729, 'MİMARLIK VE MÜHENDİSLİK', '38.32.01', '', 0),
(730, 'MİMARLIK VE MÜHENDİSLİK', '38.32.02', '', 0),
(731, 'MİMARLIK VE MÜHENDİSLİK', '39.00.01', '', 0),
(732, 'MİMARLIK VE MÜHENDİSLİK', '46.18.06', '', 0),
(733, 'MİMARLIK VE MÜHENDİSLİK', '46.77.01', '', 0),
(734, 'MİMARLIK VE MÜHENDİSLİK', '46.77.02', '', 0),
(735, 'MİMARLIK VE MÜHENDİSLİK', '71.11.01', '', 0),
(736, 'MİMARLIK VE MÜHENDİSLİK', '71.11.02', '', 0),
(737, 'MİMARLIK VE MÜHENDİSLİK', '71.11.04', '', 0),
(738, 'MİMARLIK VE MÜHENDİSLİK', '71.12.01', '', 0),
(739, 'MİMARLIK VE MÜHENDİSLİK', '71.12.03', '', 0),
(740, 'MİMARLIK VE MÜHENDİSLİK', '71.12.04', '', 0),
(741, 'MİMARLIK VE MÜHENDİSLİK', '71.12.05', '', 0),
(742, 'MİMARLIK VE MÜHENDİSLİK', '71.12.06', '', 0),
(743, 'MİMARLIK VE MÜHENDİSLİK', '71.12.07', '', 0),
(744, 'MİMARLIK VE MÜHENDİSLİK', '71.12.08', '', 0),
(745, 'MİMARLIK VE MÜHENDİSLİK', '71.12.09', '', 0),
(746, 'MİMARLIK VE MÜHENDİSLİK', '71.12.10', '', 0),
(747, 'MİMARLIK VE MÜHENDİSLİK', '71.12.11', '', 0),
(748, 'MİMARLIK VE MÜHENDİSLİK', '71.12.12', '', 0),
(749, 'MİMARLIK VE MÜHENDİSLİK', '71.12.13', '', 0),
(750, 'MİMARLIK VE MÜHENDİSLİK', '71.12.90', '', 0),
(751, 'MİMARLIK VE MÜHENDİSLİK', '71.20.05', '', 0),
(752, 'MİMARLIK VE MÜHENDİSLİK', '71.20.07', '', 0),
(753, 'MİMARLIK VE MÜHENDİSLİK', '71.20.08', '', 0),
(754, 'MİMARLIK VE MÜHENDİSLİK', '71.20.09', '', 0),
(755, 'MİMARLIK VE MÜHENDİSLİK', '71.20.10', '', 0),
(756, 'MİMARLIK VE MÜHENDİSLİK', '71.20.11', '', 0),
(757, 'MİMARLIK VE MÜHENDİSLİK', '71.20.12', '', 0),
(758, 'MİMARLIK VE MÜHENDİSLİK', '71.20.13', '', 0),
(759, 'MİMARLIK VE MÜHENDİSLİK', '71.20.90', '', 0),
(760, 'MİMARLIK VE MÜHENDİSLİK', '72.11.01', '', 0),
(761, 'MİMARLIK VE MÜHENDİSLİK', '72.19.01', '', 0),
(762, 'MİMARLIK VE MÜHENDİSLİK', '72.20.01', '', 0),
(763, 'MİMARLIK VE MÜHENDİSLİK', '74.10.01', '', 0),
(764, 'BİLGİ, İLETİŞİM VE MEDYA', '26.70.11', '', 0),
(765, 'BİLGİ, İLETİŞİM VE MEDYA', '26.70.12', '', 0),
(766, 'BİLGİ, İLETİŞİM VE MEDYA', '26.70.13', '', 0),
(767, 'BİLGİ, İLETİŞİM VE MEDYA', '32.20.21', '', 0),
(768, 'BİLGİ, İLETİŞİM VE MEDYA', '32.20.22', '', 0),
(769, 'BİLGİ, İLETİŞİM VE MEDYA', '32.20.23', '', 0),
(770, 'BİLGİ, İLETİŞİM VE MEDYA', '32.20.24', '', 0),
(771, 'BİLGİ, İLETİŞİM VE MEDYA', '32.20.25', '', 0),
(772, 'BİLGİ, İLETİŞİM VE MEDYA', '32.20.26', '', 0),
(773, 'BİLGİ, İLETİŞİM VE MEDYA', '32.20.27', '', 0),
(774, 'BİLGİ, İLETİŞİM VE MEDYA', '32.20.28', '', 0),
(775, 'BİLGİ, İLETİŞİM VE MEDYA', '32.20.90', '', 0),
(776, 'BİLGİ, İLETİŞİM VE MEDYA', '46.49.06', '', 0),
(777, 'BİLGİ, İLETİŞİM VE MEDYA', '46.49.21', '', 0),
(778, 'BİLGİ, İLETİŞİM VE MEDYA', '47.59.05', '', 0),
(779, 'BİLGİ, İLETİŞİM VE MEDYA', '47.78.06', '', 0),
(780, 'BİLGİ, İLETİŞİM VE MEDYA', '59.11.03', '', 0),
(781, 'BİLGİ, İLETİŞİM VE MEDYA', '59.12.01', '', 0),
(782, 'BİLGİ, İLETİŞİM VE MEDYA', '59.13.02', '', 0),
(783, 'BİLGİ, İLETİŞİM VE MEDYA', '59.14.02', '', 0),
(784, 'BİLGİ, İLETİŞİM VE MEDYA', '59.20.01', '', 0),
(785, 'BİLGİ, İLETİŞİM VE MEDYA', '59.20.02', '', 0),
(786, 'BİLGİ, İLETİŞİM VE MEDYA', '59.20.03', '', 0),
(787, 'BİLGİ, İLETİŞİM VE MEDYA', '59.20.06', '', 0),
(788, 'BİLGİ, İLETİŞİM VE MEDYA', '60.10.09', '', 0),
(789, 'BİLGİ, İLETİŞİM VE MEDYA', '60.20.01', '', 0),
(790, 'BİLGİ, İLETİŞİM VE MEDYA', '63.11.08', '', 0),
(791, 'BİLGİ, İLETİŞİM VE MEDYA', '63.12.01', '', 0),
(792, 'BİLGİ, İLETİŞİM VE MEDYA', '63.91.01', '', 0),
(793, 'BİLGİ, İLETİŞİM VE MEDYA', '63.99.01', '', 0),
(794, 'BİLGİ, İLETİŞİM VE MEDYA', '70.21.01', '', 0),
(795, 'BİLGİ, İLETİŞİM VE MEDYA', '73.11.01', '', 0),
(796, 'BİLGİ, İLETİŞİM VE MEDYA', '73.11.03', '', 0),
(797, 'BİLGİ, İLETİŞİM VE MEDYA', '73.12.02', '', 0),
(798, 'BİLGİ, İLETİŞİM VE MEDYA', '73.20.03', '', 0),
(799, 'BİLGİ, İLETİŞİM VE MEDYA', '74.10.02', '', 0),
(800, 'BİLGİ, İLETİŞİM VE MEDYA', '74.10.03', '', 0),
(801, 'BİLGİ, İLETİŞİM VE MEDYA', '74.30.12', '', 0),
(802, 'BİLGİ, İLETİŞİM VE MEDYA', '74.90.05', '', 0),
(803, 'BİLGİ, İLETİŞİM VE MEDYA', '78.10.04', '', 0),
(804, 'BİLGİ, İLETİŞİM VE MEDYA', '79.90.01', '', 0),
(805, 'BİLGİ, İLETİŞİM VE MEDYA', '79.90.02', '', 0),
(806, 'BİLGİ, İLETİŞİM VE MEDYA', '84.12.14', '', 0),
(807, 'BİLGİ, İLETİŞİM VE MEDYA', '90.01.14', '', 0),
(808, 'BİLGİ, İLETİŞİM VE MEDYA', '90.01.15', '', 0),
(809, 'BİLGİ, İLETİŞİM VE MEDYA', '90.01.16', '', 0),
(810, 'BİLGİ, İLETİŞİM VE MEDYA', '90.01.17', '', 0),
(811, 'BİLGİ, İLETİŞİM VE MEDYA', '90.01.18', '', 0),
(812, 'BİLGİ, İLETİŞİM VE MEDYA', '90.02.11', '', 0),
(813, 'BİLGİ, İLETİŞİM VE MEDYA', '90.03.09', '', 0),
(814, 'BİLGİ, İLETİŞİM VE MEDYA', '90.03.11', '', 0),
(815, 'BİLGİ, İLETİŞİM VE MEDYA', '90.03.12', '', 0),
(816, 'BİLGİ, İLETİŞİM VE MEDYA', '90.04.01', '', 0),
(817, 'BİLGİ, İLETİŞİM VE MEDYA', '91.01.02', '', 0),
(818, 'BİLGİ, İLETİŞİM VE MEDYA', '91.02.01', '', 0),
(819, 'BİLGİ, İLETİŞİM VE MEDYA', '91.03.02', '', 0),
(820, 'BİLGİ, İLETİŞİM VE MEDYA', '91.04.02', '', 0),
(821, 'BİLGİ, İLETİŞİM VE MEDYA', '93.29.05', '', 0),
(822, 'BİLGİ, İLETİŞİM VE MEDYA', '93.29.08', '', 0),
(823, 'BİLGİ, İLETİŞİM VE MEDYA', '94.99.09', '', 0),
(824, 'BİLGİ, İLETİŞİM VE MEDYA', '94.99.16', '', 0),
(825, 'BİLGİ, İLETİŞİM VE MEDYA', '95.29.06', '', 0),
(826, 'KÜLTÜR VE SPOR', '32.30.17', '', 0),
(827, 'KÜLTÜR VE SPOR', '32.30.18', '', 0),
(828, 'KÜLTÜR VE SPOR', '32.30.19', '', 0),
(829, 'KÜLTÜR VE SPOR', '32.30.20', '', 0),
(830, 'KÜLTÜR VE SPOR', '32.30.21', '', 0),
(831, 'KÜLTÜR VE SPOR', '32.40.01', '', 0),
(832, 'KÜLTÜR VE SPOR', '32.40.02', '', 0),
(833, 'KÜLTÜR VE SPOR', '32.40.06', '', 0),
(834, 'KÜLTÜR VE SPOR', '46.49.02', '', 0),
(835, 'KÜLTÜR VE SPOR', '46.49.09', '', 0),
(836, 'KÜLTÜR VE SPOR', '46.49.26', '', 0),
(837, 'KÜLTÜR VE SPOR', '46.49.27', '', 0),
(838, 'KÜLTÜR VE SPOR', '47.64.07', '', 0),
(839, 'KÜLTÜR VE SPOR', '47.64.90', '', 0),
(840, 'KÜLTÜR VE SPOR', '47.78.01', '', 0),
(841, 'KÜLTÜR VE SPOR', '47.89.11', '', 0),
(842, 'KÜLTÜR VE SPOR', '61.90.05', '', 0),
(843, 'KÜLTÜR VE SPOR', '90.01.20', '', 0),
(844, 'KÜLTÜR VE SPOR', '90.01.90', '', 0),
(845, 'KÜLTÜR VE SPOR', '90.02.12', '', 0),
(846, 'KÜLTÜR VE SPOR', '92.00.01', '', 0),
(847, 'KÜLTÜR VE SPOR', '92.00.02', '', 0),
(848, 'KÜLTÜR VE SPOR', '92.00.03', '', 0),
(849, 'KÜLTÜR VE SPOR', '93.11.01', '', 0),
(850, 'KÜLTÜR VE SPOR', '93.11.02', '', 0),
(851, 'KÜLTÜR VE SPOR', '93.12.01', '', 0),
(852, 'KÜLTÜR VE SPOR', '93.12.03', '', 0),
(853, 'KÜLTÜR VE SPOR', '93.12.04', '', 0),
(854, 'KÜLTÜR VE SPOR', '93.12.05', '', 0),
(855, 'KÜLTÜR VE SPOR', '93.12.06', '', 0),
(856, 'KÜLTÜR VE SPOR', '93.12.07', '', 0),
(857, 'KÜLTÜR VE SPOR', '93.12.09', '', 0),
(858, 'KÜLTÜR VE SPOR', '93.12.90', '', 0),
(859, 'KÜLTÜR VE SPOR', '93.13.01', '', 0),
(860, 'KÜLTÜR VE SPOR', '93.19.01', '', 0),
(861, 'KÜLTÜR VE SPOR', '93.19.02', '', 0),
(862, 'KÜLTÜR VE SPOR', '93.19.03', '', 0),
(863, 'KÜLTÜR VE SPOR', '93.19.04', '', 0),
(864, 'KÜLTÜR VE SPOR', '93.19.05', '', 0),
(865, 'KÜLTÜR VE SPOR', '93.19.06', '', 0),
(866, 'KÜLTÜR VE SPOR', '93.19.90', '', 0),
(867, 'KÜLTÜR VE SPOR', '93.21.01', '', 0),
(868, 'KÜLTÜR VE SPOR', '93.29.01', '', 0),
(869, 'KÜLTÜR VE SPOR', '93.29.02', '', 0),
(870, 'KÜLTÜR VE SPOR', '93.29.03', '', 0),
(871, 'KÜLTÜR VE SPOR', '93.29.07', '', 0),
(872, 'KÜLTÜR VE SPOR', '93.29.09', '', 0),
(873, 'KÜLTÜR VE SPOR', '93.29.10', '', 0),
(874, 'KÜLTÜR VE SPOR', '93.29.90', '', 0),
(875, 'KÜLTÜR VE SPOR', '94.11.03', '', 0),
(876, 'KÜLTÜR VE SPOR', '94.11.04', '', 0),
(877, 'KÜLTÜR VE SPOR', '94.11.05', '', 0),
(878, 'KÜLTÜR VE SPOR', '94.11.06', '', 0),
(879, 'KÜLTÜR VE SPOR', '94.11.90', '', 0),
(880, 'KÜLTÜR VE SPOR', '94.12.01', '', 0),
(881, 'KÜLTÜR VE SPOR', '94.12.05', '', 0),
(882, 'KÜLTÜR VE SPOR', '94.12.90', '', 0),
(883, 'KÜLTÜR VE SPOR', '94.20.01', '', 0),
(884, 'KÜLTÜR VE SPOR', '94.91.02', '', 0),
(885, 'KÜLTÜR VE SPOR', '94.92.02', '', 0),
(886, 'KÜLTÜR VE SPOR', '94.99.01', '', 0),
(887, 'KÜLTÜR VE SPOR', '94.99.02', '', 0),
(888, 'KÜLTÜR VE SPOR', '94.99.03', '', 0),
(889, 'KÜLTÜR VE SPOR', '94.99.04', '', 0),
(890, 'KÜLTÜR VE SPOR', '94.99.05', '', 0),
(891, 'KÜLTÜR VE SPOR', '94.99.08', '', 0),
(892, 'KÜLTÜR VE SPOR', '94.99.12', '', 0),
(893, 'KÜLTÜR VE SPOR', '94.99.13', '', 0),
(894, 'KÜLTÜR VE SPOR', '94.99.14', '', 0),
(895, 'KÜLTÜR VE SPOR', '94.99.15', '', 0),
(896, 'KÜLTÜR VE SPOR', '94.99.17', '', 0),
(897, 'KÜLTÜR VE SPOR', '94.99.18', '', 0),
(898, 'KÜLTÜR VE SPOR', '94.99.19', '', 0),
(899, 'KÜLTÜR VE SPOR', '94.99.20', '', 0),
(900, 'KÜLTÜR VE SPOR', '94.99.21', '', 0),
(901, 'KÜLTÜR VE SPOR', '94.99.22', '', 0),
(902, 'KÜLTÜR VE SPOR', '94.99.23', '', 0),
(903, 'KÜLTÜR VE SPOR', '94.99.24', '', 0),
(904, 'KÜLTÜR VE SPOR', '94.99.90', '', 0),
(905, 'KÜLTÜR VE SPOR', '95.29.03', '', 0),
(906, 'KÜLTÜR VE SPOR', '96.03.01', '', 0),
(907, 'KÜLTÜR VE SPOR', '96.04.01', '', 0),
(908, 'KÜLTÜR VE SPOR', '96.04.02', '', 0),
(909, 'KÜLTÜR VE SPOR', '96.04.03', '', 0),
(910, 'KÜLTÜR VE SPOR', '96.09.02', '', 0),
(911, 'KÜLTÜR VE SPOR', '96.09.03', '', 0),
(912, 'KÜLTÜR VE SPOR', '96.09.04', '', 0),
(913, 'KÜLTÜR VE SPOR', '96.09.05', '', 0),
(914, 'KÜLTÜR VE SPOR', '96.09.07', '', 0),
(915, 'KÜLTÜR VE SPOR', '96.09.08', '', 0),
(916, 'KÜLTÜR VE SPOR', '96.09.09', '', 0),
(917, 'KÜLTÜR VE SPOR', '96.09.10', '', 0),
(918, 'KÜLTÜR VE SPOR', '96.09.12', '', 0),
(919, 'KÜLTÜR VE SPOR', '96.09.14', '', 0),
(920, 'KÜLTÜR VE SPOR', '96.09.15', '', 0),
(921, 'KÜLTÜR VE SPOR', '96.09.18', '', 0),
(922, 'KÜLTÜR VE SPOR', '96.09.90', '', 0),
(923, 'BASIM-YAYIN', '18.11.01', '', 0),
(924, 'BASIM-YAYIN', '18.12.01', '', 0),
(925, 'BASIM-YAYIN', '18.12.02', '', 0),
(926, 'BASIM-YAYIN', '18.12.03', '', 0),
(927, 'BASIM-YAYIN', '18.12.04', '', 0),
(928, 'BASIM-YAYIN', '18.12.05', '', 0),
(929, 'BASIM-YAYIN', '18.12.06', '', 0),
(930, 'BASIM-YAYIN', '18.12.07', '', 0),
(931, 'BASIM-YAYIN', '18.13.01', '', 0),
(932, 'BASIM-YAYIN', '18.13.02', '', 0),
(933, 'BASIM-YAYIN', '18.14.01', '', 0),
(934, 'BASIM-YAYIN', '18.20.02', '', 0),
(935, 'BASIM-YAYIN', '18.20.03', '', 0),
(936, 'BASIM-YAYIN', '46.49.11', '', 0),
(937, 'BASIM-YAYIN', '47.61.01', '', 0),
(938, 'BASIM-YAYIN', '47.62.03', '', 0),
(939, 'BASIM-YAYIN', '47.63.01', '', 0),
(940, 'BASIM-YAYIN', '47.79.03', '', 0),
(941, 'BASIM-YAYIN', '47.89.15', '', 0),
(942, 'BASIM-YAYIN', '58.11.01', '', 0),
(943, 'BASIM-YAYIN', '58.11.03', '', 0),
(944, 'BASIM-YAYIN', '58.11.04', '', 0),
(945, 'BASIM-YAYIN', '58.12.01', '', 0),
(946, 'BASIM-YAYIN', '58.13.01', '', 0),
(947, 'BASIM-YAYIN', '58.14.02', '', 0),
(948, 'BASIM-YAYIN', '58.14.03', '', 0);
INSERT INTO t_nace_code (id, name_tr, code, name, active) VALUES
(949, 'BASIM-YAYIN', '58.14.90', '', 0),
(950, 'BASIM-YAYIN', '58.19.04', '', 0),
(951, 'BASIM-YAYIN', '58.19.90', '', 0),
(952, 'SAĞLIK HİZMETLERİ', '75.00.02', '', 0),
(953, 'SAĞLIK HİZMETLERİ', '75.00.04', '', 0),
(954, 'SAĞLIK HİZMETLERİ', '86.10.04', '', 0),
(955, 'SAĞLIK HİZMETLERİ', '86.10.05', '', 0),
(956, 'SAĞLIK HİZMETLERİ', '86.10.12', '', 0),
(957, 'SAĞLIK HİZMETLERİ', '86.10.13', '', 0),
(958, 'SAĞLIK HİZMETLERİ', '86.21.02', '', 0),
(959, 'SAĞLIK HİZMETLERİ', '86.21.03', '', 0),
(960, 'SAĞLIK HİZMETLERİ', '86.21.04', '', 0),
(961, 'SAĞLIK HİZMETLERİ', '86.21.90', '', 0),
(962, 'SAĞLIK HİZMETLERİ', '86.22.02', '', 0),
(963, 'SAĞLIK HİZMETLERİ', '86.22.05', '', 0),
(964, 'SAĞLIK HİZMETLERİ', '86.22.06', '', 0),
(965, 'SAĞLIK HİZMETLERİ', '86.22.07', '', 0),
(966, 'SAĞLIK HİZMETLERİ', '86.22.90', '', 0),
(967, 'SAĞLIK HİZMETLERİ', '86.23.01', '', 0),
(968, 'SAĞLIK HİZMETLERİ', '86.23.03', '', 0),
(969, 'SAĞLIK HİZMETLERİ', '86.23.05', '', 0),
(970, 'SAĞLIK HİZMETLERİ', '86.90.01', '', 0),
(971, 'SAĞLIK HİZMETLERİ', '86.90.03', '', 0),
(972, 'SAĞLIK HİZMETLERİ', '86.90.04', '', 0),
(973, 'SAĞLIK HİZMETLERİ', '86.90.05', '', 0),
(974, 'SAĞLIK HİZMETLERİ', '86.90.06', '', 0),
(975, 'SAĞLIK HİZMETLERİ', '86.90.07', '', 0),
(976, 'SAĞLIK HİZMETLERİ', '86.90.09', '', 0),
(977, 'SAĞLIK HİZMETLERİ', '86.90.10', '', 0),
(978, 'SAĞLIK HİZMETLERİ', '86.90.14', '', 0),
(979, 'SAĞLIK HİZMETLERİ', '86.90.16', '', 0),
(980, 'SAĞLIK HİZMETLERİ', '86.90.90', '', 0),
(981, 'SAĞLIK HİZMETLERİ', '87.10.01', '', 0),
(982, 'SAĞLIK HİZMETLERİ', '87.20.02', '', 0),
(983, 'SAĞLIK HİZMETLERİ', '87.30.02', '', 0),
(984, 'SAĞLIK HİZMETLERİ', '87.90.03', '', 0),
(985, 'SAĞLIK HİZMETLERİ', '87.90.04', '', 0),
(986, 'SAĞLIK HİZMETLERİ', '87.90.90', '', 0),
(987, 'SAĞLIK HİZMETLERİ', '88.10.02', '', 0),
(988, 'SAĞLIK HİZMETLERİ', '88.91.01', '', 0),
(989, 'SAĞLIK HİZMETLERİ', '88.99.07', '', 0),
(990, 'SAĞLIK HİZMETLERİ', '88.99.08', '', 0),
(991, 'SAĞLIK HİZMETLERİ', '88.99.09', '', 0),
(992, 'DERİ, KÜRK VE SARACİYE', '14.11.05', '', 0),
(993, 'DERİ, KÜRK VE SARACİYE', '14.20.04', '', 0),
(994, 'DERİ, KÜRK VE SARACİYE', '14.20.05', '', 0),
(995, 'DERİ, KÜRK VE SARACİYE', '15.11.10', '', 0),
(996, 'DERİ, KÜRK VE SARACİYE', '15.11.11', '', 0),
(997, 'DERİ, KÜRK VE SARACİYE', '15.11.13', '', 0),
(998, 'DERİ, KÜRK VE SARACİYE', '15.12.07', '', 0),
(999, 'DERİ, KÜRK VE SARACİYE', '15.12.08', '', 0),
(1000, 'DERİ, KÜRK VE SARACİYE', '15.12.09', '', 0),
(1001, 'DERİ, KÜRK VE SARACİYE', '15.12.12', '', 0),
(1002, 'DERİ, KÜRK VE SARACİYE', '46.24.01', '', 0),
(1003, 'DERİ, KÜRK VE SARACİYE', '46.24.02', '', 0),
(1004, 'DERİ, KÜRK VE SARACİYE', '46.42.04', '', 0),
(1005, 'DERİ, KÜRK VE SARACİYE', '46.49.01', '', 0),
(1006, 'DERİ, KÜRK VE SARACİYE', '47.71.03', '', 0),
(1007, 'DERİ, KÜRK VE SARACİYE', '47.72.02', '', 0),
(1008, 'DERİ, KÜRK VE SARACİYE', '47.72.05', '', 0),
(1009, 'DERİ, KÜRK VE SARACİYE', '47.72.90', '', 0),
(1010, 'DERİ, KÜRK VE SARACİYE', '95.29.07', '', 0),
(1011, 'İPLİK VE ELYAF ÜRÜNLERİ', '13.10.03', '', 0),
(1012, 'İPLİK VE ELYAF ÜRÜNLERİ', '13.10.05', '', 0),
(1013, 'İPLİK VE ELYAF ÜRÜNLERİ', '13.10.06', '', 0),
(1014, 'İPLİK VE ELYAF ÜRÜNLERİ', '13.10.08', '', 0),
(1015, 'İPLİK VE ELYAF ÜRÜNLERİ', '13.10.09', '', 0),
(1016, 'İPLİK VE ELYAF ÜRÜNLERİ', '13.10.10', '', 0),
(1017, 'İPLİK VE ELYAF ÜRÜNLERİ', '13.10.12', '', 0),
(1018, 'İPLİK VE ELYAF ÜRÜNLERİ', '13.10.13', '', 0),
(1019, 'İPLİK VE ELYAF ÜRÜNLERİ', '13.10.14', '', 0),
(1020, 'İPLİK VE ELYAF ÜRÜNLERİ', '13.10.15', '', 0),
(1021, 'İPLİK VE ELYAF ÜRÜNLERİ', '13.92.06', '', 0),
(1022, 'İPLİK VE ELYAF ÜRÜNLERİ', '13.99.04', '', 0),
(1023, 'İPLİK VE ELYAF ÜRÜNLERİ', '13.99.06', '', 0),
(1024, 'İPLİK VE ELYAF ÜRÜNLERİ', '20.60.01', '', 0),
(1025, 'İPLİK VE ELYAF ÜRÜNLERİ', '20.60.02', '', 0),
(1026, 'İPLİK VE ELYAF ÜRÜNLERİ', '46.21.05', '', 0),
(1027, 'İPLİK VE ELYAF ÜRÜNLERİ', '46.21.06', '', 0),
(1028, 'İPLİK VE ELYAF ÜRÜNLERİ', '46.21.07', '', 0),
(1029, 'İPLİK VE ELYAF ÜRÜNLERİ', '46.41.04', '', 0),
(1030, 'İPLİK VE ELYAF ÜRÜNLERİ', '46.76.01', '', 0),
(1031, 'İPLİK VE ELYAF ÜRÜNLERİ', '46.76.90', '', 0),
(1032, 'İPLİK VE ELYAF ÜRÜNLERİ', '47.78.16', '', 0),
(1033, 'İPLİK VE ELYAF ÜRÜNLERİ', '47.78.30', '', 0),
(1034, 'ÖRME KUMAŞ, ÇORAP VE TRİKOTAJ', '13.91.01', '', 0),
(1035, 'ÖRME KUMAŞ, ÇORAP VE TRİKOTAJ', '13.91.02', '', 0),
(1036, 'ÖRME KUMAŞ, ÇORAP VE TRİKOTAJ', '14.31.01', '', 0),
(1037, 'ÖRME KUMAŞ, ÇORAP VE TRİKOTAJ', '14.39.01', '', 0),
(1038, 'KUMAŞ', '46.41.03', '', 0),
(1039, 'KUMAŞ', '47.51.02', '', 0),
(1040, 'HAZIR GİYİM VE KONFEKSİYON', '14.13.04', '', 0),
(1041, 'HAZIR GİYİM VE KONFEKSİYON', '14.13.05', '', 0),
(1042, 'HAZIR GİYİM VE KONFEKSİYON', '14.13.06', '', 0),
(1043, 'HAZIR GİYİM VE KONFEKSİYON', '14.13.07', '', 0),
(1044, 'HAZIR GİYİM VE KONFEKSİYON', '46.42.01', '', 0),
(1045, 'HAZIR GİYİM VE KONFEKSİYON', '46.42.05', '', 0),
(1046, 'HAZIR GİYİM VE KONFEKSİYON', '47.71.04', '', 0),
(1047, 'HAZIR GİYİM VE KONFEKSİYON', '47.71.07', '', 0),
(1048, 'HAZIR GİYİM VE KONFEKSİYON', '47.71.08', '', 0),
(1049, 'HAZIR GİYİM VE KONFEKSİYON', '47.71.10', '', 0),
(1050, 'HAZIR GİYİM VE KONFEKSİYON', '47.71.12', '', 0),
(1051, 'HAZIR GİYİM VE KONFEKSİYON', '47.71.90', '', 0),
(1052, 'HAZIR GİYİM VE KONFEKSİYON', '95.29.02', '', 0),
(1053, 'İÇ GİYİM VE AKSESUARLARI', '14.12.07', '', 0),
(1054, 'İÇ GİYİM VE AKSESUARLARI', '14.12.08', '', 0),
(1055, 'İÇ GİYİM VE AKSESUARLARI', '14.14.01', '', 0),
(1056, 'İÇ GİYİM VE AKSESUARLARI', '14.14.02', '', 0),
(1057, 'İÇ GİYİM VE AKSESUARLARI', '14.14.03', '', 0),
(1058, 'İÇ GİYİM VE AKSESUARLARI', '14.14.04', '', 0),
(1059, 'İÇ GİYİM VE AKSESUARLARI', '14.19.01', '', 0),
(1060, 'İÇ GİYİM VE AKSESUARLARI', '14.19.07', '', 0),
(1061, 'İÇ GİYİM VE AKSESUARLARI', '46.42.03', '', 0),
(1062, 'İÇ GİYİM VE AKSESUARLARI', '46.42.06', '', 0),
(1063, 'İÇ GİYİM VE AKSESUARLARI', '47.71.01', '', 0),
(1064, 'İÇ GİYİM VE AKSESUARLARI', '47.71.02', '', 0),
(1065, 'İÇ GİYİM VE AKSESUARLARI', '47.71.05', '', 0),
(1066, 'İÇ GİYİM VE AKSESUARLARI', '47.71.09', '', 0),
(1067, 'İÇ GİYİM VE AKSESUARLARI', '47.71.11', '', 0),
(1068, 'İÇ GİYİM VE AKSESUARLARI', '47.82.01', '', 0),
(1069, 'EV TEKSTİLİ', '13.92.01', '', 0),
(1070, 'EV TEKSTİLİ', '13.92.02', '', 0),
(1071, 'EV TEKSTİLİ', '13.92.03', '', 0),
(1072, 'EV TEKSTİLİ', '13.92.04', '', 0),
(1073, 'EV TEKSTİLİ', '13.92.10', '', 0),
(1074, 'EV TEKSTİLİ', '13.99.02', '', 0),
(1075, 'EV TEKSTİLİ', '46.16.04', '', 0),
(1076, 'EV TEKSTİLİ', '46.41.01', '', 0),
(1077, 'EV TEKSTİLİ', '47.51.05', '', 0),
(1078, 'EV TEKSTİLİ', '47.53.01', '', 0),
(1079, 'HALI-KİLİM VE YER KAPLAMALARI', '13.93.01', '', 0),
(1080, 'HALI-KİLİM VE YER KAPLAMALARI', '13.93.02', '', 0),
(1081, 'HALI-KİLİM VE YER KAPLAMALARI', '16.10.05', '', 0),
(1082, 'HALI-KİLİM VE YER KAPLAMALARI', '46.47.02', '', 0),
(1083, 'HALI-KİLİM VE YER KAPLAMALARI', '46.73.21', '', 0),
(1084, 'HALI-KİLİM VE YER KAPLAMALARI', '46.73.23', '', 0),
(1085, 'HALI-KİLİM VE YER KAPLAMALARI', '47.53.02', '', 0),
(1086, 'HALI-KİLİM VE YER KAPLAMALARI', '47.53.03', '', 0),
(1087, 'HALI-KİLİM VE YER KAPLAMALARI', '47.89.18', '', 0),
(1088, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '13.92.09', '', 0),
(1089, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '13.92.11', '', 0),
(1090, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '13.94.02', '', 0),
(1091, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '13.94.03', '', 0),
(1092, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '13.95.01', '', 0),
(1093, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '13.96.02', '', 0),
(1094, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '13.96.03', '', 0),
(1095, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '13.96.04', '', 0),
(1096, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '13.96.05', '', 0),
(1097, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '13.96.07', '', 0),
(1098, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '13.96.08', '', 0),
(1099, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '13.99.03', '', 0),
(1100, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '14.19.04', '', 0),
(1101, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '14.19.05', '', 0),
(1102, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '14.19.08', '', 0),
(1103, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '32.99.01', '', 0),
(1104, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '32.99.02', '', 0),
(1105, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '32.99.07', '', 0),
(1106, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '33.19.01', '', 0),
(1107, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '33.19.02', '', 0),
(1108, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '46.16.03', '', 0),
(1109, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '46.41.02', '', 0),
(1110, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '46.41.05', '', 0),
(1111, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '46.42.07', '', 0),
(1112, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '47.51.03', '', 0),
(1113, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '47.51.04', '', 0),
(1114, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '47.51.90', '', 0),
(1115, 'TEKSTİL YAN SANAYİ ÜRÜNLERİ', '47.82.02', '', 0),
(1116, 'TEKSTİL TERBİYE', '13.30.01', '', 0),
(1117, 'TEKSTİL TERBİYE', '13.30.02', '', 0),
(1118, 'TEKSTİL TERBİYE', '13.30.03', '', 0),
(1119, 'TEKSTİL TERBİYE', '13.30.04', '', 0),
(1120, 'TEKSTİL TERBİYE', '96.01.01', '', 0),
(1121, 'TEKSTİL TERBİYE', '96.01.02', '', 0),
(1122, 'TEKSTİL TERBİYE', '96.01.03', '', 0),
(1123, 'TEKSTİL TERBİYE', '96.01.04', '', 0),
(1124, 'TEKSTİL TERBİYE', '96.01.05', '', 0),
(1125, 'ALTYAPI İNŞAATI', '42.11.01', '', 0),
(1126, 'ALTYAPI İNŞAATI', '42.11.02', '', 0),
(1127, 'ALTYAPI İNŞAATI', '42.11.03', '', 0),
(1128, 'ALTYAPI İNŞAATI', '42.12.01', '', 0),
(1129, 'ALTYAPI İNŞAATI', '42.13.01', '', 0),
(1130, 'ALTYAPI İNŞAATI', '42.13.02', '', 0),
(1131, 'ALTYAPI İNŞAATI', '42.21.01', '', 0),
(1132, 'ALTYAPI İNŞAATI', '42.21.02', '', 0),
(1133, 'ALTYAPI İNŞAATI', '42.21.03', '', 0),
(1134, 'ALTYAPI İNŞAATI', '42.21.05', '', 0),
(1135, 'ALTYAPI İNŞAATI', '42.22.01', '', 0),
(1136, 'ALTYAPI İNŞAATI', '42.22.02', '', 0),
(1137, 'ALTYAPI İNŞAATI', '42.22.04', '', 0),
(1138, 'ALTYAPI İNŞAATI', '42.91.01', '', 0),
(1139, 'ALTYAPI İNŞAATI', '42.91.02', '', 0),
(1140, 'ALTYAPI İNŞAATI', '42.91.03', '', 0),
(1141, 'ALTYAPI İNŞAATI', '42.91.04', '', 0),
(1142, 'ALTYAPI İNŞAATI', '42.99.03', '', 0),
(1143, 'ALTYAPI İNŞAATI', '43.12.01', '', 0),
(1144, 'ALTYAPI İNŞAATI', '43.12.02', '', 0),
(1145, 'ALTYAPI İNŞAATI', '43.13.01', '', 0),
(1146, 'ALTYAPI İNŞAATI', '43.99.02', '', 0),
(1147, 'KONUT İNŞAATI', '41.10.02', '', 0),
(1148, 'KONUT İNŞAATI', '41.20.02', '', 0),
(1149, 'KONUT İNŞAATI', '41.20.04', '', 0),
(1150, 'İNŞAAT TAAHHÜT', '41.10.01', '', 0),
(1151, 'İNŞAAT TAAHHÜT', '41.10.03', '', 0),
(1152, 'İNŞAAT TAAHHÜT', '41.20.01', '', 0),
(1153, 'İNŞAAT TAAHHÜT', '41.20.03', '', 0),
(1154, 'İNŞAAT TAAHHÜT', '42.99.01', '', 0),
(1155, 'İNŞAAT TAAHHÜT', '42.99.02', '', 0),
(1156, 'İNŞAAT TAAHHÜT', '42.99.04', '', 0),
(1157, 'İNŞAAT TAAHHÜT', '43.11.01', '', 0),
(1158, 'İNŞAAT TAAHHÜT', '43.29.05', '', 0),
(1159, 'İNŞAAT TAAHHÜT', '43.31.01', '', 0),
(1160, 'İNŞAAT TAAHHÜT', '43.99.01', '', 0),
(1161, 'İNŞAAT TAAHHÜT', '43.99.03', '', 0),
(1162, 'İNŞAAT TAAHHÜT', '43.99.04', '', 0),
(1163, 'İNŞAAT TAAHHÜT', '43.99.05', '', 0),
(1164, 'İNŞAAT TAAHHÜT', '43.99.07', '', 0),
(1165, 'İNŞAAT TAAHHÜT', '43.99.11', '', 0),
(1166, 'RESTORASYON VE İZOLASYON', '23.99.01', '', 0),
(1167, 'RESTORASYON VE İZOLASYON', '23.99.02', '', 0),
(1168, 'RESTORASYON VE İZOLASYON', '38.11.02', '', 0),
(1169, 'RESTORASYON VE İZOLASYON', '41.20.05', '', 0),
(1170, 'RESTORASYON VE İZOLASYON', '43.29.03', '', 0),
(1171, 'RESTORASYON VE İZOLASYON', '43.33.01', '', 0),
(1172, 'RESTORASYON VE İZOLASYON', '43.33.02', '', 0),
(1173, 'RESTORASYON VE İZOLASYON', '43.34.01', '', 0),
(1174, 'RESTORASYON VE İZOLASYON', '43.34.02', '', 0),
(1175, 'RESTORASYON VE İZOLASYON', '43.34.03', '', 0),
(1176, 'RESTORASYON VE İZOLASYON', '43.39.01', '', 0),
(1177, 'RESTORASYON VE İZOLASYON', '43.39.02', '', 0),
(1178, 'RESTORASYON VE İZOLASYON', '43.91.01', '', 0),
(1179, 'RESTORASYON VE İZOLASYON', '43.99.06', '', 0),
(1180, 'RESTORASYON VE İZOLASYON', '43.99.08', '', 0),
(1181, 'RESTORASYON VE İZOLASYON', '43.99.10', '', 0),
(1182, 'RESTORASYON VE İZOLASYON', '43.99.13', '', 0),
(1183, 'RESTORASYON VE İZOLASYON', '43.99.14', '', 0),
(1184, 'RESTORASYON VE İZOLASYON', '43.99.15', '', 0),
(1185, 'İNŞAAT MALZEMELERİ', '16.23.01', '', 0),
(1186, 'İNŞAAT MALZEMELERİ', '16.23.02', '', 0),
(1187, 'İNŞAAT MALZEMELERİ', '46.13.01', '', 0),
(1188, 'İNŞAAT MALZEMELERİ', '46.73.06', '', 0),
(1189, 'İNŞAAT MALZEMELERİ', '46.73.07', '', 0),
(1190, 'İNŞAAT MALZEMELERİ', '46.73.08', '', 0),
(1191, 'İNŞAAT MALZEMELERİ', '46.73.09', '', 0),
(1192, 'İNŞAAT MALZEMELERİ', '46.73.13', '', 0),
(1193, 'İNŞAAT MALZEMELERİ', '46.73.14', '', 0),
(1194, 'İNŞAAT MALZEMELERİ', '46.73.16', '', 0),
(1195, 'İNŞAAT MALZEMELERİ', '46.73.18', '', 0),
(1196, 'İNŞAAT MALZEMELERİ', '46.73.19', '', 0),
(1197, 'İNŞAAT MALZEMELERİ', '46.73.22', '', 0),
(1198, 'İNŞAAT MALZEMELERİ', '46.73.90', '', 0),
(1199, 'İNŞAAT MALZEMELERİ', '47.52.05', '', 0),
(1200, 'İNŞAAT MALZEMELERİ', '47.52.11', '', 0),
(1201, 'İNŞAAT MALZEMELERİ', '47.52.17', '', 0),
(1202, 'İNŞAAT MALZEMELERİ', '47.52.18', '', 0),
(1203, 'İNŞAAT MALZEMELERİ', '47.52.20', '', 0),
(1204, 'İNŞAAT MALZEMELERİ', '47.52.22', '', 0),
(1205, 'İNŞAAT MALZEMELERİ', '47.52.90', '', 0),
(1206, 'TOPRAK ÜRÜNLERİ', '23.20.16', '', 0),
(1207, 'TOPRAK ÜRÜNLERİ', '23.20.17', '', 0),
(1208, 'TOPRAK ÜRÜNLERİ', '23.20.18', '', 0),
(1209, 'TOPRAK ÜRÜNLERİ', '23.31.01', '', 0),
(1210, 'TOPRAK ÜRÜNLERİ', '23.32.01', '', 0),
(1211, 'TOPRAK ÜRÜNLERİ', '23.42.01', '', 0),
(1212, 'TOPRAK ÜRÜNLERİ', '23.43.01', '', 0),
(1213, 'TOPRAK ÜRÜNLERİ', '23.44.01', '', 0),
(1214, 'TOPRAK ÜRÜNLERİ', '23.49.01', '', 0),
(1215, 'TOPRAK ÜRÜNLERİ', '23.49.02', '', 0),
(1216, 'TOPRAK ÜRÜNLERİ', '23.51.01', '', 0),
(1217, 'TOPRAK ÜRÜNLERİ', '23.52.01', '', 0),
(1218, 'TOPRAK ÜRÜNLERİ', '23.52.02', '', 0),
(1219, 'TOPRAK ÜRÜNLERİ', '23.52.03', '', 0),
(1220, 'TOPRAK ÜRÜNLERİ', '23.61.01', '', 0),
(1221, 'TOPRAK ÜRÜNLERİ', '23.61.02', '', 0),
(1222, 'TOPRAK ÜRÜNLERİ', '23.61.03', '', 0),
(1223, 'TOPRAK ÜRÜNLERİ', '23.62.01', '', 0),
(1224, 'TOPRAK ÜRÜNLERİ', '23.63.01', '', 0),
(1225, 'TOPRAK ÜRÜNLERİ', '23.64.01', '', 0),
(1226, 'TOPRAK ÜRÜNLERİ', '23.65.02', '', 0),
(1227, 'TOPRAK ÜRÜNLERİ', '23.69.01', '', 0),
(1228, 'TOPRAK ÜRÜNLERİ', '23.69.02', '', 0),
(1229, 'TOPRAK ÜRÜNLERİ', '23.99.04', '', 0),
(1230, 'TOPRAK ÜRÜNLERİ', '23.99.05', '', 0),
(1231, 'TOPRAK ÜRÜNLERİ', '23.99.09', '', 0),
(1232, 'TOPRAK ÜRÜNLERİ', '23.99.90', '', 0),
(1233, 'TOPRAK ÜRÜNLERİ', '46.73.05', '', 0),
(1234, 'TOPRAK ÜRÜNLERİ', '47.52.01', '', 0),
(1235, 'MEKANİK TESİSAT VE DOĞALGAZ TESİSATI', '28.25.03', '', 0),
(1236, 'MEKANİK TESİSAT VE DOĞALGAZ TESİSATI', '28.25.04', '', 0),
(1237, 'MEKANİK TESİSAT VE DOĞALGAZ TESİSATI', '33.20.45', '', 0),
(1238, 'MEKANİK TESİSAT VE DOĞALGAZ TESİSATI', '43.22.01', '', 0),
(1239, 'MEKANİK TESİSAT VE DOĞALGAZ TESİSATI', '43.22.03', '', 0),
(1240, 'MEKANİK TESİSAT VE DOĞALGAZ TESİSATI', '43.22.05', '', 0),
(1241, 'MEKANİK TESİSAT VE DOĞALGAZ TESİSATI', '46.74.03', '', 0),
(1242, 'MEKANİK TESİSAT VE DOĞALGAZ TESİSATI', '46.74.04', '', 0),
(1243, 'MEKANİK TESİSAT VE DOĞALGAZ TESİSATI', '46.74.06', '', 0),
(1244, 'MEKANİK TESİSAT VE DOĞALGAZ TESİSATI', '47.52.06', '', 0),
(1245, 'MEKANİK TESİSAT VE DOĞALGAZ TESİSATI', '47.52.15', '', 0),
(1246, 'AYAKKABI VE AYAKKABI YAN SANAYİ', '15.20.15', '', 0),
(1247, 'AYAKKABI VE AYAKKABI YAN SANAYİ', '15.20.17', '', 0),
(1248, 'AYAKKABI VE AYAKKABI YAN SANAYİ', '15.20.18', '', 0),
(1249, 'AYAKKABI VE AYAKKABI YAN SANAYİ', '15.20.19', '', 0),
(1250, 'AYAKKABI VE AYAKKABI YAN SANAYİ', '22.19.05', '', 0),
(1251, 'AYAKKABI VE AYAKKABI YAN SANAYİ', '22.29.04', '', 0),
(1252, 'AYAKKABI VE AYAKKABI YAN SANAYİ', '46.16.01', '', 0),
(1253, 'AYAKKABI VE AYAKKABI YAN SANAYİ', '46.16.02', '', 0),
(1254, 'AYAKKABI VE AYAKKABI YAN SANAYİ', '46.42.02', '', 0),
(1255, 'AYAKKABI VE AYAKKABI YAN SANAYİ', '46.42.08', '', 0),
(1256, 'AYAKKABI VE AYAKKABI YAN SANAYİ', '47.64.06', '', 0),
(1257, 'AYAKKABI VE AYAKKABI YAN SANAYİ', '47.72.01', '', 0),
(1258, 'AYAKKABI VE AYAKKABI YAN SANAYİ', '47.72.06', '', 0),
(1259, 'AYAKKABI VE AYAKKABI YAN SANAYİ', '95.23.01', '', 0),
(1260, 'AYAKKABI VE AYAKKABI YAN SANAYİ', '96.09.01', '', 0),
(1261, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '23.99.03', '', 0),
(1262, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '25.99.08', '', 0),
(1263, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '25.99.19', '', 0),
(1264, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '27.20.01', '', 0),
(1265, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '27.20.03', '', 0),
(1266, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '28.11.10', '', 0),
(1267, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '28.13.04', '', 0),
(1268, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '28.15.02', '', 0),
(1269, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '28.15.03', '', 0),
(1270, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '28.29.18', '', 0),
(1271, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '28.30.08', '', 0),
(1272, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '28.30.10', '', 0),
(1273, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '28.92.08', '', 0),
(1274, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '28.92.09', '', 0),
(1275, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '29.10.01', '', 0),
(1276, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '29.10.02', '', 0),
(1277, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '29.10.03', '', 0),
(1278, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '29.10.04', '', 0),
(1279, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '29.10.05', '', 0),
(1280, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '29.10.07', '', 0),
(1281, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '29.10.08', '', 0),
(1282, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '29.20.01', '', 0),
(1283, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '29.20.02', '', 0),
(1284, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '29.20.03', '', 0),
(1285, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '29.20.04', '', 0),
(1286, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '29.20.05', '', 0),
(1287, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '29.20.06', '', 0),
(1288, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '29.31.04', '', 0),
(1289, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '29.31.05', '', 0),
(1290, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '29.31.06', '', 0),
(1291, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '29.31.07', '', 0),
(1292, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '29.32.20', '', 0),
(1293, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '29.32.21', '', 0),
(1294, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '29.32.22', '', 0),
(1295, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '30.12.01', '', 0),
(1296, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '30.12.03', '', 0),
(1297, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '30.12.04', '', 0),
(1298, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '30.20.01', '', 0),
(1299, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '30.20.02', '', 0),
(1300, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '30.20.03', '', 0),
(1301, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '30.20.04', '', 0),
(1302, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '30.20.05', '', 0),
(1303, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '30.91.01', '', 0),
(1304, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '30.91.02', '', 0),
(1305, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '30.91.03', '', 0),
(1306, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '30.92.01', '', 0),
(1307, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '30.92.02', '', 0),
(1308, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '30.92.03', '', 0),
(1309, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '30.92.04', '', 0),
(1310, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '30.92.05', '', 0),
(1311, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '30.99.01', '', 0),
(1312, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '30.99.90', '', 0),
(1313, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '45.20.01', '', 0),
(1314, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '45.20.08', '', 0),
(1315, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '45.31.10', '', 0),
(1316, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '45.31.11', '', 0),
(1317, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '45.31.12', '', 0),
(1318, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '45.31.13', '', 0),
(1319, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '45.31.14', '', 0),
(1320, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '45.32.02', '', 0),
(1321, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '45.32.03', '', 0),
(1322, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '45.32.04', '', 0),
(1323, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '45.32.05', '', 0),
(1324, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '45.32.06', '', 0),
(1325, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '45.32.90', '', 0),
(1326, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '45.40.01', '', 0),
(1327, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '45.40.05', '', 0),
(1328, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '45.40.06', '', 0),
(1329, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '45.40.07', '', 0),
(1330, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '47.64.05', '', 0),
(1331, 'KARA TAŞITLARI, YEDEK PARÇALARI VE EKİPMANLARI', '47.78.27', '', 0),
(1332, 'MOTORLU TAŞIT SATIŞ VE SERVİSİ', '45.11.10', '', 0),
(1333, 'MOTORLU TAŞIT SATIŞ VE SERVİSİ', '45.11.11', '', 0),
(1334, 'MOTORLU TAŞIT SATIŞ VE SERVİSİ', '45.11.12', '', 0),
(1335, 'MOTORLU TAŞIT SATIŞ VE SERVİSİ', '45.11.13', '', 0),
(1336, 'MOTORLU TAŞIT SATIŞ VE SERVİSİ', '45.19.01', '', 0),
(1337, 'MOTORLU TAŞIT SATIŞ VE SERVİSİ', '45.19.02', '', 0),
(1338, 'MOTORLU TAŞIT SATIŞ VE SERVİSİ', '45.40.02', '', 0),
(1339, 'MOTORLU TAŞIT SATIŞ VE SERVİSİ', '45.40.03', '', 0),
(1340, 'MOTORLU TAŞIT SATIŞ VE SERVİSİ', '45.40.04', '', 0),
(1341, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '28.11.08', '', 0),
(1342, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '28.11.09', '', 0),
(1343, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '30.11.01', '', 0),
(1344, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '30.11.02', '', 0),
(1345, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '30.11.03', '', 0),
(1346, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '30.11.04', '', 0),
(1347, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '30.11.05', '', 0),
(1348, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '30.11.06', '', 0),
(1349, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '30.11.07', '', 0),
(1350, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '30.11.08', '', 0),
(1351, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '30.30.01', '', 0),
(1352, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '30.30.02', '', 0),
(1353, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '30.30.03', '', 0),
(1354, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '30.30.04', '', 0),
(1355, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '30.30.05', '', 0),
(1356, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '30.30.06', '', 0),
(1357, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '30.30.07', '', 0),
(1358, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '30.30.08', '', 0),
(1359, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '30.40.01', '', 0),
(1360, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '30.99.02', '', 0),
(1361, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '33.15.01', '', 0),
(1362, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '33.16.01', '', 0),
(1363, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '33.17.01', '', 0),
(1364, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '33.17.90', '', 0),
(1365, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '45.20.02', '', 0),
(1366, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '45.20.03', '', 0),
(1367, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '45.20.04', '', 0),
(1368, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '45.20.05', '', 0),
(1369, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '45.20.06', '', 0),
(1370, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '45.20.07', '', 0),
(1371, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '46.14.03', '', 0),
(1372, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '46.69.01', '', 0),
(1373, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '46.69.03', '', 0),
(1374, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '47.64.02', '', 0),
(1375, 'MOTORLU ARAÇLAR TAMİR, BAKIM VE İMALATI', '95.29.05', '', 0),
(1376, 'DEMİR ÇELİK', '46.72.04', '', 0),
(1377, 'DEMİR ÇELİK', '46.72.05', '', 0),
(1378, 'DEMİR ÇELİK', '46.72.08', '', 0),
(1379, 'DEMİR ÇELİK', '46.72.09', '', 0),
(1380, 'DEMİR ÇELİK', '46.72.10', '', 0),
(1381, 'DEMİR ÇELİK', '47.52.13', '', 0),
(1382, 'DEMİR DIŞI METALLER', '24.41.19', '', 0),
(1383, 'DEMİR DIŞI METALLER', '24.42.16', '', 0),
(1384, 'DEMİR DIŞI METALLER', '24.42.17', '', 0),
(1385, 'DEMİR DIŞI METALLER', '24.42.18', '', 0),
(1386, 'DEMİR DIŞI METALLER', '24.42.20', '', 0),
(1387, 'DEMİR DIŞI METALLER', '24.42.21', '', 0),
(1388, 'DEMİR DIŞI METALLER', '24.43.01', '', 0),
(1389, 'DEMİR DIŞI METALLER', '24.43.02', '', 0),
(1390, 'DEMİR DIŞI METALLER', '24.43.04', '', 0),
(1391, 'DEMİR DIŞI METALLER', '24.43.05', '', 0),
(1392, 'DEMİR DIŞI METALLER', '24.43.06', '', 0),
(1393, 'DEMİR DIŞI METALLER', '24.43.07', '', 0),
(1394, 'DEMİR DIŞI METALLER', '24.43.08', '', 0),
(1395, 'DEMİR DIŞI METALLER', '24.44.01', '', 0),
(1396, 'DEMİR DIŞI METALLER', '24.44.03', '', 0),
(1397, 'DEMİR DIŞI METALLER', '24.44.04', '', 0),
(1398, 'DEMİR DIŞI METALLER', '24.45.01', '', 0),
(1399, 'DEMİR DIŞI METALLER', '24.45.02', '', 0),
(1400, 'DEMİR DIŞI METALLER', '24.45.06', '', 0),
(1401, 'DEMİR DIŞI METALLER', '24.46.01', '', 0),
(1402, 'DEMİR DIŞI METALLER', '32.12.03', '', 0),
(1403, 'DEMİR DIŞI METALLER', '46.72.01', '', 0),
(1404, 'DEMİR DIŞI METALLER', '46.72.02', '', 0),
(1405, 'DEMİR DIŞI METALLER', '46.72.06', '', 0),
(1406, 'DEMİR DIŞI METALLER', '46.72.07', '', 0),
(1407, 'DÖKÜM VE METAL İŞLEME', '24.10.01', '', 0),
(1408, 'DÖKÜM VE METAL İŞLEME', '24.10.02', '', 0),
(1409, 'DÖKÜM VE METAL İŞLEME', '24.10.03', '', 0),
(1410, 'DÖKÜM VE METAL İŞLEME', '24.10.05', '', 0),
(1411, 'DÖKÜM VE METAL İŞLEME', '24.10.06', '', 0),
(1412, 'DÖKÜM VE METAL İŞLEME', '24.10.07', '', 0),
(1413, 'DÖKÜM VE METAL İŞLEME', '24.10.08', '', 0),
(1414, 'DÖKÜM VE METAL İŞLEME', '24.10.09', '', 0),
(1415, 'DÖKÜM VE METAL İŞLEME', '24.10.10', '', 0),
(1416, 'DÖKÜM VE METAL İŞLEME', '24.10.12', '', 0),
(1417, 'DÖKÜM VE METAL İŞLEME', '24.20.09', '', 0),
(1418, 'DÖKÜM VE METAL İŞLEME', '24.20.10', '', 0),
(1419, 'DÖKÜM VE METAL İŞLEME', '24.31.01', '', 0),
(1420, 'DÖKÜM VE METAL İŞLEME', '24.32.01', '', 0),
(1421, 'DÖKÜM VE METAL İŞLEME', '24.33.01', '', 0),
(1422, 'DÖKÜM VE METAL İŞLEME', '24.34.01', '', 0),
(1423, 'DÖKÜM VE METAL İŞLEME', '24.51.13', '', 0),
(1424, 'DÖKÜM VE METAL İŞLEME', '24.52.20', '', 0),
(1425, 'DÖKÜM VE METAL İŞLEME', '24.53.01', '', 0),
(1426, 'DÖKÜM VE METAL İŞLEME', '24.54.01', '', 0),
(1427, 'DÖKÜM VE METAL İŞLEME', '24.54.02', '', 0),
(1428, 'DÖKÜM VE METAL İŞLEME', '25.50.01', '', 0),
(1429, 'DÖKÜM VE METAL İŞLEME', '25.50.02', '', 0),
(1430, 'DÖKÜM VE METAL İŞLEME', '25.62.01', '', 0),
(1431, 'DÖKÜM VE METAL İŞLEME', '25.62.02', '', 0),
(1432, 'DÖKÜM VE METAL İŞLEME', '25.73.03', '', 0),
(1433, 'DÖKÜM VE METAL İŞLEME', '25.73.06', '', 0),
(1434, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.11.06', '', 0),
(1435, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.11.07', '', 0),
(1436, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.11.08', '', 0),
(1437, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.12.04', '', 0),
(1438, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.12.05', '', 0),
(1439, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.12.06', '', 0),
(1440, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.29.01', '', 0),
(1441, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.29.02', '', 0),
(1442, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.71.01', '', 0),
(1443, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.71.02', '', 0),
(1444, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.71.03', '', 0),
(1445, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.71.04', '', 0),
(1446, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.71.05', '', 0),
(1447, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.91.01', '', 0),
(1448, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.92.01', '', 0),
(1449, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.92.02', '', 0),
(1450, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.92.03', '', 0),
(1451, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.99.01', '', 0),
(1452, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.99.02', '', 0),
(1453, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.99.03', '', 0),
(1454, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.99.04', '', 0),
(1455, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.99.05', '', 0),
(1456, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.99.06', '', 0),
(1457, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.99.07', '', 0),
(1458, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.99.09', '', 0),
(1459, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.99.11', '', 0),
(1460, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.99.12', '', 0),
(1461, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.99.13', '', 0),
(1462, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.99.15', '', 0),
(1463, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.99.16', '', 0),
(1464, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.99.17', '', 0),
(1465, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.99.18', '', 0),
(1466, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.99.20', '', 0),
(1467, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '25.99.21', '', 0),
(1468, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '28.21.07', '', 0),
(1469, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '28.21.11', '', 0),
(1470, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '32.12.08', '', 0),
(1471, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '46.15.04', '', 0),
(1472, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '46.49.07', '', 0),
(1473, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '47.59.06', '', 0),
(1474, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '47.59.09', '', 0),
(1475, 'METAL ÜRÜNLER VE MUTFAK EKİPMANLARI', '47.89.10', '', 0),
(1476, 'MAKİNA VE EKİPMANLARI', '25.21.10', '', 0),
(1477, 'MAKİNA VE EKİPMANLARI', '25.21.11', '', 0),
(1478, 'MAKİNA VE EKİPMANLARI', '25.21.12', '', 0),
(1479, 'MAKİNA VE EKİPMANLARI', '25.30.01', '', 0),
(1480, 'MAKİNA VE EKİPMANLARI', '25.30.02', '', 0),
(1481, 'MAKİNA VE EKİPMANLARI', '28.13.01', '', 0),
(1482, 'MAKİNA VE EKİPMANLARI', '28.13.03', '', 0),
(1483, 'MAKİNA VE EKİPMANLARI', '28.14.01', '', 0),
(1484, 'MAKİNA VE EKİPMANLARI', '28.14.02', '', 0),
(1485, 'MAKİNA VE EKİPMANLARI', '28.21.08', '', 0),
(1486, 'MAKİNA VE EKİPMANLARI', '28.21.09', '', 0),
(1487, 'MAKİNA VE EKİPMANLARI', '28.21.10', '', 0),
(1488, 'MAKİNA VE EKİPMANLARI', '28.21.90', '', 0),
(1489, 'MAKİNA VE EKİPMANLARI', '28.22.10', '', 0),
(1490, 'MAKİNA VE EKİPMANLARI', '28.22.11', '', 0),
(1491, 'MAKİNA VE EKİPMANLARI', '28.22.12', '', 0),
(1492, 'MAKİNA VE EKİPMANLARI', '28.22.13', '', 0),
(1493, 'MAKİNA VE EKİPMANLARI', '28.25.01', '', 0),
(1494, 'MAKİNA VE EKİPMANLARI', '28.25.02', '', 0),
(1495, 'MAKİNA VE EKİPMANLARI', '28.29.01', '', 0),
(1496, 'MAKİNA VE EKİPMANLARI', '28.29.02', '', 0),
(1497, 'MAKİNA VE EKİPMANLARI', '28.29.03', '', 0),
(1498, 'MAKİNA VE EKİPMANLARI', '28.29.04', '', 0),
(1499, 'MAKİNA VE EKİPMANLARI', '28.29.05', '', 0),
(1500, 'MAKİNA VE EKİPMANLARI', '28.29.06', '', 0),
(1501, 'MAKİNA VE EKİPMANLARI', '28.29.08', '', 0),
(1502, 'MAKİNA VE EKİPMANLARI', '28.29.09', '', 0),
(1503, 'MAKİNA VE EKİPMANLARI', '28.29.12', '', 0),
(1504, 'MAKİNA VE EKİPMANLARI', '28.29.17', '', 0),
(1505, 'MAKİNA VE EKİPMANLARI', '28.29.19', '', 0),
(1506, 'MAKİNA VE EKİPMANLARI', '28.29.20', '', 0),
(1507, 'MAKİNA VE EKİPMANLARI', '28.30.09', '', 0),
(1508, 'MAKİNA VE EKİPMANLARI', '28.30.11', '', 0),
(1509, 'MAKİNA VE EKİPMANLARI', '28.30.13', '', 0),
(1510, 'MAKİNA VE EKİPMANLARI', '28.30.14', '', 0),
(1511, 'MAKİNA VE EKİPMANLARI', '28.30.15', '', 0),
(1512, 'MAKİNA VE EKİPMANLARI', '28.92.01', '', 0),
(1513, 'MAKİNA VE EKİPMANLARI', '28.92.02', '', 0),
(1514, 'MAKİNA VE EKİPMANLARI', '28.92.03', '', 0),
(1515, 'MAKİNA VE EKİPMANLARI', '28.92.05', '', 0),
(1516, 'MAKİNA VE EKİPMANLARI', '28.92.06', '', 0),
(1517, 'MAKİNA VE EKİPMANLARI', '28.92.10', '', 0),
(1518, 'MAKİNA VE EKİPMANLARI', '28.92.11', '', 0),
(1519, 'MAKİNA VE EKİPMANLARI', '28.93.01', '', 0),
(1520, 'MAKİNA VE EKİPMANLARI', '28.93.02', '', 0),
(1521, 'MAKİNA VE EKİPMANLARI', '28.93.03', '', 0),
(1522, 'MAKİNA VE EKİPMANLARI', '28.93.04', '', 0),
(1523, 'MAKİNA VE EKİPMANLARI', '28.93.06', '', 0),
(1524, 'MAKİNA VE EKİPMANLARI', '28.93.07', '', 0),
(1525, 'MAKİNA VE EKİPMANLARI', '28.93.08', '', 0),
(1526, 'MAKİNA VE EKİPMANLARI', '28.93.09', '', 0),
(1527, 'MAKİNA VE EKİPMANLARI', '28.93.10', '', 0),
(1528, 'MAKİNA VE EKİPMANLARI', '28.94.01', '', 0),
(1529, 'MAKİNA VE EKİPMANLARI', '28.94.02', '', 0),
(1530, 'MAKİNA VE EKİPMANLARI', '28.94.03', '', 0),
(1531, 'MAKİNA VE EKİPMANLARI', '28.94.04', '', 0),
(1532, 'MAKİNA VE EKİPMANLARI', '28.94.05', '', 0),
(1533, 'MAKİNA VE EKİPMANLARI', '28.94.06', '', 0),
(1534, 'MAKİNA VE EKİPMANLARI', '28.94.07', '', 0),
(1535, 'MAKİNA VE EKİPMANLARI', '28.94.08', '', 0),
(1536, 'MAKİNA VE EKİPMANLARI', '28.94.09', '', 0),
(1537, 'MAKİNA VE EKİPMANLARI', '28.95.01', '', 0),
(1538, 'MAKİNA VE EKİPMANLARI', '28.96.01', '', 0),
(1539, 'MAKİNA VE EKİPMANLARI', '28.99.01', '', 0),
(1540, 'MAKİNA VE EKİPMANLARI', '28.99.02', '', 0),
(1541, 'MAKİNA VE EKİPMANLARI', '28.99.04', '', 0),
(1542, 'MAKİNA VE EKİPMANLARI', '28.99.05', '', 0),
(1543, 'MAKİNA VE EKİPMANLARI', '28.99.06', '', 0),
(1544, 'MAKİNA VE EKİPMANLARI', '28.99.07', '', 0),
(1545, 'MAKİNA VE EKİPMANLARI', '28.99.08', '', 0),
(1546, 'MAKİNA VE EKİPMANLARI', '28.99.09', '', 0),
(1547, 'MAKİNA VE EKİPMANLARI', '28.99.10', '', 0),
(1548, 'MAKİNA VE EKİPMANLARI', '28.99.11', '', 0),
(1549, 'MAKİNA VE EKİPMANLARI', '28.99.12', '', 0),
(1550, 'MAKİNA VE EKİPMANLARI', '28.99.90', '', 0),
(1551, 'MAKİNA VE EKİPMANLARI', '33.11.01', '', 0),
(1552, 'MAKİNA VE EKİPMANLARI', '33.11.02', '', 0),
(1553, 'MAKİNA VE EKİPMANLARI', '33.11.03', '', 0),
(1554, 'MAKİNA VE EKİPMANLARI', '33.11.04', '', 0),
(1555, 'MAKİNA VE EKİPMANLARI', '33.11.10', '', 0),
(1556, 'MAKİNA VE EKİPMANLARI', '33.11.90', '', 0),
(1557, 'MAKİNA VE EKİPMANLARI', '33.13.01', '', 0),
(1558, 'MAKİNA VE EKİPMANLARI', '33.13.02', '', 0),
(1559, 'MAKİNA VE EKİPMANLARI', '33.13.04', '', 0),
(1560, 'MAKİNA VE EKİPMANLARI', '33.14.03', '', 0),
(1561, 'MAKİNA VE EKİPMANLARI', '33.20.33', '', 0),
(1562, 'MAKİNA VE EKİPMANLARI', '33.20.34', '', 0),
(1563, 'MAKİNA VE EKİPMANLARI', '33.20.35', '', 0),
(1564, 'MAKİNA VE EKİPMANLARI', '33.20.36', '', 0),
(1565, 'MAKİNA VE EKİPMANLARI', '33.20.37', '', 0),
(1566, 'MAKİNA VE EKİPMANLARI', '33.20.38', '', 0),
(1567, 'MAKİNA VE EKİPMANLARI', '33.20.39', '', 0),
(1568, 'MAKİNA VE EKİPMANLARI', '33.20.40', '', 0),
(1569, 'MAKİNA VE EKİPMANLARI', '33.20.41', '', 0),
(1570, 'MAKİNA VE EKİPMANLARI', '33.20.42', '', 0),
(1571, 'MAKİNA VE EKİPMANLARI', '33.20.43', '', 0),
(1572, 'MAKİNA VE EKİPMANLARI', '33.20.44', '', 0),
(1573, 'MAKİNA VE EKİPMANLARI', '33.20.46', '', 0),
(1574, 'MAKİNA VE EKİPMANLARI', '33.20.48', '', 0),
(1575, 'MAKİNA VE EKİPMANLARI', '33.20.49', '', 0),
(1576, 'MAKİNA VE EKİPMANLARI', '33.20.52', '', 0),
(1577, 'MAKİNA VE EKİPMANLARI', '33.20.53', '', 0),
(1578, 'MAKİNA VE EKİPMANLARI', '33.20.54', '', 0),
(1579, 'MAKİNA VE EKİPMANLARI', '33.20.90', '', 0),
(1580, 'MAKİNA VE EKİPMANLARI', '43.29.01', '', 0),
(1581, 'MAKİNA VE EKİPMANLARI', '43.29.02', '', 0),
(1582, 'MAKİNA VE EKİPMANLARI', '46.14.02', '', 0),
(1583, 'MAKİNA VE EKİPMANLARI', '46.61.02', '', 0),
(1584, 'MAKİNA VE EKİPMANLARI', '46.63.01', '', 0),
(1585, 'MAKİNA VE EKİPMANLARI', '46.63.02', '', 0),
(1586, 'MAKİNA VE EKİPMANLARI', '46.64.01', '', 0),
(1587, 'MAKİNA VE EKİPMANLARI', '46.64.02', '', 0),
(1588, 'TAKIM TEZGAHLARI VE OTOMASYON', '28.12.05', '', 0),
(1589, 'TAKIM TEZGAHLARI VE OTOMASYON', '28.13.02', '', 0),
(1590, 'TAKIM TEZGAHLARI VE OTOMASYON', '28.41.01', '', 0),
(1591, 'TAKIM TEZGAHLARI VE OTOMASYON', '28.41.03', '', 0),
(1592, 'TAKIM TEZGAHLARI VE OTOMASYON', '28.41.06', '', 0),
(1593, 'TAKIM TEZGAHLARI VE OTOMASYON', '28.41.07', '', 0),
(1594, 'TAKIM TEZGAHLARI VE OTOMASYON', '28.49.02', '', 0),
(1595, 'TAKIM TEZGAHLARI VE OTOMASYON', '28.49.03', '', 0),
(1596, 'TAKIM TEZGAHLARI VE OTOMASYON', '28.49.04', '', 0),
(1597, 'TAKIM TEZGAHLARI VE OTOMASYON', '28.49.05', '', 0),
(1598, 'TAKIM TEZGAHLARI VE OTOMASYON', '28.49.90', '', 0),
(1599, 'TAKIM TEZGAHLARI VE OTOMASYON', '28.91.01', '', 0),
(1600, 'TAKIM TEZGAHLARI VE OTOMASYON', '28.91.02', '', 0),
(1601, 'TAKIM TEZGAHLARI VE OTOMASYON', '33.12.02', '', 0),
(1602, 'TAKIM TEZGAHLARI VE OTOMASYON', '33.12.03', '', 0),
(1603, 'TAKIM TEZGAHLARI VE OTOMASYON', '33.12.04', '', 0),
(1604, 'TAKIM TEZGAHLARI VE OTOMASYON', '33.12.05', '', 0),
(1605, 'TAKIM TEZGAHLARI VE OTOMASYON', '33.12.06', '', 0),
(1606, 'TAKIM TEZGAHLARI VE OTOMASYON', '33.12.07', '', 0),
(1607, 'TAKIM TEZGAHLARI VE OTOMASYON', '33.12.08', '', 0),
(1608, 'TAKIM TEZGAHLARI VE OTOMASYON', '33.12.09', '', 0),
(1609, 'TAKIM TEZGAHLARI VE OTOMASYON', '33.12.10', '', 0),
(1610, 'TAKIM TEZGAHLARI VE OTOMASYON', '33.12.11', '', 0),
(1611, 'TAKIM TEZGAHLARI VE OTOMASYON', '33.12.14', '', 0),
(1612, 'TAKIM TEZGAHLARI VE OTOMASYON', '33.12.15', '', 0),
(1613, 'TAKIM TEZGAHLARI VE OTOMASYON', '33.12.16', '', 0),
(1614, 'TAKIM TEZGAHLARI VE OTOMASYON', '33.12.17', '', 0),
(1615, 'TAKIM TEZGAHLARI VE OTOMASYON', '33.12.19', '', 0),
(1616, 'TAKIM TEZGAHLARI VE OTOMASYON', '33.12.21', '', 0),
(1617, 'TAKIM TEZGAHLARI VE OTOMASYON', '33.12.28', '', 0),
(1618, 'TAKIM TEZGAHLARI VE OTOMASYON', '33.12.29', '', 0),
(1619, 'TAKIM TEZGAHLARI VE OTOMASYON', '33.12.30', '', 0),
(1620, 'TAKIM TEZGAHLARI VE OTOMASYON', '33.19.90', '', 0),
(1621, 'TAKIM TEZGAHLARI VE OTOMASYON', '46.62.01', '', 0),
(1622, 'TAKIM TEZGAHLARI VE OTOMASYON', '46.62.02', '', 0),
(1623, 'TAKIM TEZGAHLARI VE OTOMASYON', '46.62.90', '', 0),
(1624, 'TAKIM TEZGAHLARI VE OTOMASYON', '46.69.07', '', 0),
(1625, 'TAKIM TEZGAHLARI VE OTOMASYON', '46.69.08', '', 0),
(1626, 'TAKIM TEZGAHLARI VE OTOMASYON', '46.69.11', '', 0),
(1627, 'TAKIM TEZGAHLARI VE OTOMASYON', '46.69.12', '', 0),
(1628, 'TAKIM TEZGAHLARI VE OTOMASYON', '46.69.14', '', 0),
(1629, 'TAKIM TEZGAHLARI VE OTOMASYON', '46.69.15', '', 0),
(1630, 'TEKNİK HIRDAVAT', '13.92.07', '', 0),
(1631, 'TEKNİK HIRDAVAT', '13.92.08', '', 0),
(1632, 'TEKNİK HIRDAVAT', '22.29.02', '', 0),
(1633, 'TEKNİK HIRDAVAT', '23.91.01', '', 0),
(1634, 'TEKNİK HIRDAVAT', '25.40.01', '', 0),
(1635, 'TEKNİK HIRDAVAT', '25.40.02', '', 0),
(1636, 'TEKNİK HIRDAVAT', '25.40.03', '', 0),
(1637, 'TEKNİK HIRDAVAT', '25.72.01', '', 0),
(1638, 'TEKNİK HIRDAVAT', '25.73.02', '', 0),
(1639, 'TEKNİK HIRDAVAT', '25.73.04', '', 0),
(1640, 'TEKNİK HIRDAVAT', '25.93.01', '', 0),
(1641, 'TEKNİK HIRDAVAT', '25.93.02', '', 0),
(1642, 'TEKNİK HIRDAVAT', '25.93.03', '', 0),
(1643, 'TEKNİK HIRDAVAT', '25.94.01', '', 0),
(1644, 'TEKNİK HIRDAVAT', '25.94.02', '', 0),
(1645, 'TEKNİK HIRDAVAT', '25.99.10', '', 0),
(1646, 'TEKNİK HIRDAVAT', '25.99.14', '', 0),
(1647, 'TEKNİK HIRDAVAT', '26.51.02', '', 0),
(1648, 'TEKNİK HIRDAVAT', '26.51.03', '', 0),
(1649, 'TEKNİK HIRDAVAT', '26.51.05', '', 0),
(1650, 'TEKNİK HIRDAVAT', '26.51.06', '', 0),
(1651, 'TEKNİK HIRDAVAT', '26.51.07', '', 0),
(1652, 'TEKNİK HIRDAVAT', '26.51.09', '', 0),
(1653, 'TEKNİK HIRDAVAT', '26.51.10', '', 0),
(1654, 'TEKNİK HIRDAVAT', '26.51.11', '', 0),
(1655, 'TEKNİK HIRDAVAT', '26.51.12', '', 0),
(1656, 'TEKNİK HIRDAVAT', '26.51.13', '', 0),
(1657, 'TEKNİK HIRDAVAT', '26.51.14', '', 0),
(1658, 'TEKNİK HIRDAVAT', '26.51.15', '', 0),
(1659, 'TEKNİK HIRDAVAT', '27.90.05', '', 0),
(1660, 'TEKNİK HIRDAVAT', '28.15.01', '', 0),
(1661, 'TEKNİK HIRDAVAT', '28.15.04', '', 0),
(1662, 'TEKNİK HIRDAVAT', '28.24.01', '', 0),
(1663, 'TEKNİK HIRDAVAT', '28.29.07', '', 0),
(1664, 'TEKNİK HIRDAVAT', '28.29.10', '', 0),
(1665, 'TEKNİK HIRDAVAT', '28.29.11', '', 0),
(1666, 'TEKNİK HIRDAVAT', '28.30.12', '', 0),
(1667, 'TEKNİK HIRDAVAT', '28.30.16', '', 0),
(1668, 'TEKNİK HIRDAVAT', '28.30.17', '', 0),
(1669, 'TEKNİK HIRDAVAT', '32.91.01', '', 0),
(1670, 'TEKNİK HIRDAVAT', '32.91.02', '', 0),
(1671, 'TEKNİK HIRDAVAT', '32.99.04', '', 0),
(1672, 'TEKNİK HIRDAVAT', '32.99.08', '', 0),
(1673, 'TEKNİK HIRDAVAT', '32.99.09', '', 0),
(1674, 'TEKNİK HIRDAVAT', '32.99.10', '', 0),
(1675, 'TEKNİK HIRDAVAT', '32.99.11', '', 0),
(1676, 'TEKNİK HIRDAVAT', '32.99.13', '', 0),
(1677, 'TEKNİK HIRDAVAT', '32.99.16', '', 0),
(1678, 'TEKNİK HIRDAVAT', '33.12.12', '', 0),
(1679, 'TEKNİK HIRDAVAT', '33.12.13', '', 0),
(1680, 'TEKNİK HIRDAVAT', '33.12.27', '', 0),
(1681, 'TEKNİK HIRDAVAT', '33.12.90', '', 0),
(1682, 'TEKNİK HIRDAVAT', '35.22.02', '', 0),
(1683, 'TEKNİK HIRDAVAT', '46.15.02', '', 0),
(1684, 'TEKNİK HIRDAVAT', '46.61.03', '', 0),
(1685, 'TEKNİK HIRDAVAT', '46.62.04', '', 0),
(1686, 'TEKNİK HIRDAVAT', '46.69.04', '', 0),
(1687, 'TEKNİK HIRDAVAT', '46.69.05', '', 0),
(1688, 'TEKNİK HIRDAVAT', '46.69.06', '', 0),
(1689, 'TEKNİK HIRDAVAT', '46.69.10', '', 0),
(1690, 'TEKNİK HIRDAVAT', '46.69.13', '', 0),
(1691, 'TEKNİK HIRDAVAT', '46.69.16', '', 0),
(1692, 'TEKNİK HIRDAVAT', '46.69.17', '', 0),
(1693, 'TEKNİK HIRDAVAT', '46.69.90', '', 0),
(1694, 'TEKNİK HIRDAVAT', '46.74.01', '', 0),
(1695, 'TEKNİK HIRDAVAT', '46.74.05', '', 0),
(1696, 'TEKNİK HIRDAVAT', '46.74.07', '', 0),
(1697, 'TEKNİK HIRDAVAT', '47.52.02', '', 0),
(1698, 'TEKNİK HIRDAVAT', '47.52.16', '', 0),
(1699, 'TEKNİK HIRDAVAT', '47.78.05', '', 0),
(1700, 'TEKNİK HIRDAVAT', '47.78.23', '', 0),
(1701, 'TEKNİK HIRDAVAT', '95.22.02', '', 0),
(1702, 'TEKNİK HIRDAVAT', '95.29.04', '', 0),
(1703, 'MERMERCİLİK VE MADENCİLİK', '07.10.01', '', 0),
(1704, 'MERMERCİLİK VE MADENCİLİK', '07.21.01', '', 0),
(1705, 'MERMERCİLİK VE MADENCİLİK', '07.21.02', '', 0),
(1706, 'MERMERCİLİK VE MADENCİLİK', '07.21.03', '', 0),
(1707, 'MERMERCİLİK VE MADENCİLİK', '07.21.04', '', 0),
(1708, 'MERMERCİLİK VE MADENCİLİK', '07.21.05', '', 0),
(1709, 'MERMERCİLİK VE MADENCİLİK', '07.29.01', '', 0),
(1710, 'MERMERCİLİK VE MADENCİLİK', '07.29.02', '', 0),
(1711, 'MERMERCİLİK VE MADENCİLİK', '07.29.03', '', 0),
(1712, 'MERMERCİLİK VE MADENCİLİK', '07.29.04', '', 0),
(1713, 'MERMERCİLİK VE MADENCİLİK', '07.29.05', '', 0),
(1714, 'MERMERCİLİK VE MADENCİLİK', '07.29.06', '', 0),
(1715, 'MERMERCİLİK VE MADENCİLİK', '07.29.07', '', 0),
(1716, 'MERMERCİLİK VE MADENCİLİK', '08.11.01', '', 0),
(1717, 'MERMERCİLİK VE MADENCİLİK', '08.11.02', '', 0),
(1718, 'MERMERCİLİK VE MADENCİLİK', '08.11.03', '', 0),
(1719, 'MERMERCİLİK VE MADENCİLİK', '08.11.04', '', 0),
(1720, 'MERMERCİLİK VE MADENCİLİK', '08.11.05', '', 0),
(1721, 'MERMERCİLİK VE MADENCİLİK', '08.11.06', '', 0),
(1722, 'MERMERCİLİK VE MADENCİLİK', '08.11.07', '', 0),
(1723, 'MERMERCİLİK VE MADENCİLİK', '08.12.01', '', 0),
(1724, 'MERMERCİLİK VE MADENCİLİK', '08.12.02', '', 0),
(1725, 'MERMERCİLİK VE MADENCİLİK', '08.12.03', '', 0),
(1726, 'MERMERCİLİK VE MADENCİLİK', '08.91.01', '', 0),
(1727, 'MERMERCİLİK VE MADENCİLİK', '08.91.02', '', 0),
(1728, 'MERMERCİLİK VE MADENCİLİK', '08.91.03', '', 0),
(1729, 'MERMERCİLİK VE MADENCİLİK', '08.91.04', '', 0),
(1730, 'MERMERCİLİK VE MADENCİLİK', '08.91.05', '', 0),
(1731, 'MERMERCİLİK VE MADENCİLİK', '08.93.01', '', 0),
(1732, 'MERMERCİLİK VE MADENCİLİK', '08.99.01', '', 0),
(1733, 'MERMERCİLİK VE MADENCİLİK', '08.99.02', '', 0),
(1734, 'MERMERCİLİK VE MADENCİLİK', '08.99.03', '', 0),
(1735, 'MERMERCİLİK VE MADENCİLİK', '08.99.04', '', 0),
(1736, 'MERMERCİLİK VE MADENCİLİK', '08.99.05', '', 0),
(1737, 'MERMERCİLİK VE MADENCİLİK', '08.99.90', '', 0),
(1738, 'MERMERCİLİK VE MADENCİLİK', '09.10.01', '', 0),
(1739, 'MERMERCİLİK VE MADENCİLİK', '09.10.02', '', 0),
(1740, 'MERMERCİLİK VE MADENCİLİK', '09.90.01', '', 0),
(1741, 'MERMERCİLİK VE MADENCİLİK', '09.90.02', '', 0),
(1742, 'MERMERCİLİK VE MADENCİLİK', '23.70.01', '', 0),
(1743, 'MERMERCİLİK VE MADENCİLİK', '23.70.02', '', 0),
(1744, 'MERMERCİLİK VE MADENCİLİK', '46.73.10', '', 0),
(1745, 'MERMERCİLİK VE MADENCİLİK', '46.73.11', '', 0),
(1746, 'MERMERCİLİK VE MADENCİLİK', '47.52.19', '', 0),
(1747, 'MERMERCİLİK VE MADENCİLİK', '84.13.13', '', 0),
(1748, 'ENERJİ', '06.20.01', '', 0),
(1749, 'ENERJİ', '20.13.06', '', 0),
(1750, 'ENERJİ', '35.11.19', '', 0),
(1751, 'ENERJİ', '35.13.01', '', 0),
(1752, 'ENERJİ', '35.14.02', '', 0),
(1753, 'ENERJİ', '35.14.03', '', 0),
(1754, 'ENERJİ', '35.21.01', '', 0),
(1755, 'ENERJİ', '35.22.01', '', 0),
(1756, 'ENERJİ', '35.23.01', '', 0),
(1757, 'ENERJİ', '35.23.02', '', 0),
(1758, 'ENERJİ', '35.30.21', '', 0),
(1759, 'ELEKTRİK EKİPMANLARI', '27.11.01', '', 0),
(1760, 'ELEKTRİK EKİPMANLARI', '27.11.03', '', 0),
(1761, 'ELEKTRİK EKİPMANLARI', '27.12.01', '', 0),
(1762, 'ELEKTRİK EKİPMANLARI', '27.12.02', '', 0),
(1763, 'ELEKTRİK EKİPMANLARI', '27.20.02', '', 0),
(1764, 'ELEKTRİK EKİPMANLARI', '27.20.04', '', 0),
(1765, 'ELEKTRİK EKİPMANLARI', '27.31.04', '', 0),
(1766, 'ELEKTRİK EKİPMANLARI', '27.32.03', '', 0),
(1767, 'ELEKTRİK EKİPMANLARI', '27.52.06', '', 0),
(1768, 'ELEKTRİK EKİPMANLARI', '27.90.02', '', 0),
(1769, 'ELEKTRİK EKİPMANLARI', '27.90.03', '', 0),
(1770, 'ELEKTRİK EKİPMANLARI', '27.90.04', '', 0),
(1771, 'ELEKTRİK EKİPMANLARI', '27.90.08', '', 0),
(1772, 'ELEKTRİK EKİPMANLARI', '27.90.09', '', 0),
(1773, 'ELEKTRİK EKİPMANLARI', '27.90.10', '', 0),
(1774, 'ELEKTRİK EKİPMANLARI', '27.90.90', '', 0),
(1775, 'ELEKTRİK EKİPMANLARI', '33.11.11', '', 0),
(1776, 'ELEKTRİK EKİPMANLARI', '33.14.01', '', 0),
(1777, 'ELEKTRİK EKİPMANLARI', '33.14.02', '', 0),
(1778, 'ELEKTRİK EKİPMANLARI', '33.20.51', '', 0),
(1779, 'ELEKTRİK EKİPMANLARI', '35.12.13', '', 0),
(1780, 'ELEKTRİK EKİPMANLARI', '35.13.02', '', 0),
(1781, 'ELEKTRİK EKİPMANLARI', '35.14.01', '', 0),
(1782, 'ELEKTRİK EKİPMANLARI', '43.21.01', '', 0),
(1783, 'ELEKTRİK EKİPMANLARI', '43.21.03', '', 0),
(1784, 'ELEKTRİK EKİPMANLARI', '46.43.05', '', 0),
(1785, 'ELEKTRİK EKİPMANLARI', '46.43.08', '', 0),
(1786, 'ELEKTRİK EKİPMANLARI', '46.69.09', '', 0),
(1787, 'ELEKTRİK EKİPMANLARI', '47.54.03', '', 0),
(1788, 'AYDINLATMA', '23.19.03', '', 0),
(1789, 'AYDINLATMA', '27.40.02', '', 0),
(1790, 'AYDINLATMA', '27.40.03', '', 0),
(1791, 'AYDINLATMA', '27.40.04', '', 0),
(1792, 'AYDINLATMA', '27.40.05', '', 0),
(1793, 'AYDINLATMA', '27.40.06', '', 0),
(1794, 'AYDINLATMA', '27.40.07', '', 0),
(1795, 'AYDINLATMA', '27.90.06', '', 0),
(1796, 'AYDINLATMA', '46.47.03', '', 0),
(1797, 'AYDINLATMA', '47.59.02', '', 0),
(1798, 'ELEKTRİKLİ EV ALETLERİ', '26.40.08', '', 0),
(1799, 'ELEKTRİKLİ EV ALETLERİ', '26.40.09', '', 0),
(1800, 'ELEKTRİKLİ EV ALETLERİ', '26.40.10', '', 0),
(1801, 'ELEKTRİKLİ EV ALETLERİ', '26.40.11', '', 0),
(1802, 'ELEKTRİKLİ EV ALETLERİ', '26.40.12', '', 0),
(1803, 'ELEKTRİKLİ EV ALETLERİ', '27.51.02', '', 0),
(1804, 'ELEKTRİKLİ EV ALETLERİ', '27.51.03', '', 0),
(1805, 'ELEKTRİKLİ EV ALETLERİ', '27.51.04', '', 0),
(1806, 'ELEKTRİKLİ EV ALETLERİ', '27.51.05', '', 0),
(1807, 'ELEKTRİKLİ EV ALETLERİ', '27.51.06', '', 0),
(1808, 'ELEKTRİKLİ EV ALETLERİ', '27.51.07', '', 0),
(1809, 'ELEKTRİKLİ EV ALETLERİ', '27.51.08', '', 0),
(1810, 'ELEKTRİKLİ EV ALETLERİ', '27.51.90', '', 0),
(1811, 'ELEKTRİKLİ EV ALETLERİ', '27.52.02', '', 0),
(1812, 'ELEKTRİKLİ EV ALETLERİ', '27.52.05', '', 0),
(1813, 'ELEKTRİKLİ EV ALETLERİ', '46.15.03', '', 0),
(1814, 'ELEKTRİKLİ EV ALETLERİ', '46.43.01', '', 0),
(1815, 'ELEKTRİKLİ EV ALETLERİ', '46.43.12', '', 0),
(1816, 'ELEKTRİKLİ EV ALETLERİ', '46.43.90', '', 0),
(1817, 'ELEKTRİKLİ EV ALETLERİ', '46.49.16', '', 0),
(1818, 'ELEKTRİKLİ EV ALETLERİ', '47.43.01', '', 0),
(1819, 'ELEKTRİKLİ EV ALETLERİ', '47.54.01', '', 0),
(1820, 'ELEKTRİKLİ EV ALETLERİ', '47.54.90', '', 0),
(1821, 'ELEKTRİKLİ EV ALETLERİ', '47.79.04', '', 0),
(1822, 'ELEKTRİKLİ EV ALETLERİ', '95.22.01', '', 0),
(1823, 'ELEKTRİKLİ EV ALETLERİ', '95.22.03', '', 0),
(1824, 'TELEKOMÜNİKASYON', '26.11.04', '', 0),
(1825, 'TELEKOMÜNİKASYON', '26.11.05', '', 0),
(1826, 'TELEKOMÜNİKASYON', '26.11.06', '', 0),
(1827, 'TELEKOMÜNİKASYON', '26.11.90', '', 0),
(1828, 'TELEKOMÜNİKASYON', '26.12.01', '', 0),
(1829, 'TELEKOMÜNİKASYON', '26.30.02', '', 0),
(1830, 'TELEKOMÜNİKASYON', '26.30.03', '', 0),
(1831, 'TELEKOMÜNİKASYON', '26.30.05', '', 0),
(1832, 'TELEKOMÜNİKASYON', '26.30.06', '', 0),
(1833, 'TELEKOMÜNİKASYON', '26.30.08', '', 0),
(1834, 'TELEKOMÜNİKASYON', '26.30.09', '', 0),
(1835, 'TELEKOMÜNİKASYON', '26.30.10', '', 0),
(1836, 'TELEKOMÜNİKASYON', '26.30.90', '', 0),
(1837, 'TELEKOMÜNİKASYON', '26.40.90', '', 0),
(1838, 'TELEKOMÜNİKASYON', '26.80.01', '', 0),
(1839, 'TELEKOMÜNİKASYON', '26.80.02', '', 0),
(1840, 'TELEKOMÜNİKASYON', '26.80.03', '', 0),
(1841, 'TELEKOMÜNİKASYON', '26.80.90', '', 0),
(1842, 'TELEKOMÜNİKASYON', '42.22.05', '', 0),
(1843, 'TELEKOMÜNİKASYON', '46.43.04', '', 0),
(1844, 'TELEKOMÜNİKASYON', '46.43.09', '', 0),
(1845, 'TELEKOMÜNİKASYON', '46.52.01', '', 0),
(1846, 'TELEKOMÜNİKASYON', '46.52.02', '', 0),
(1847, 'TELEKOMÜNİKASYON', '46.52.04', '', 0),
(1848, 'TELEKOMÜNİKASYON', '46.52.05', '', 0),
(1849, 'TELEKOMÜNİKASYON', '47.42.01', '', 0),
(1850, 'TELEKOMÜNİKASYON', '47.89.05', '', 0);
INSERT INTO t_nace_code (id, name_tr, code, name, active) VALUES
(1851, 'TELEKOMÜNİKASYON', '61.10.15', '', 0),
(1852, 'TELEKOMÜNİKASYON', '61.10.17', '', 0),
(1853, 'TELEKOMÜNİKASYON', '61.20.02', '', 0),
(1854, 'TELEKOMÜNİKASYON', '61.20.03', '', 0),
(1855, 'TELEKOMÜNİKASYON', '61.30.01', '', 0),
(1856, 'TELEKOMÜNİKASYON', '61.90.04', '', 0),
(1857, 'TELEKOMÜNİKASYON', '61.90.07', '', 0),
(1858, 'TELEKOMÜNİKASYON', '61.90.90', '', 0),
(1859, 'TELEKOMÜNİKASYON', '80.20.01', '', 0),
(1860, 'TELEKOMÜNİKASYON', '82.20.01', '', 0),
(1861, 'TELEKOMÜNİKASYON', '82.99.06', '', 0),
(1862, 'TELEKOMÜNİKASYON', '95.12.01', '', 0),
(1863, 'TELEKOMÜNİKASYON', '95.21.01', '', 0),
(1864, 'PLASTİK VE KAUÇUK', '16.29.04', '', 0),
(1865, 'PLASTİK VE KAUÇUK', '20.16.01', '', 0),
(1866, 'PLASTİK VE KAUÇUK', '20.16.02', '', 0),
(1867, 'PLASTİK VE KAUÇUK', '20.16.03', '', 0),
(1868, 'PLASTİK VE KAUÇUK', '20.17.01', '', 0),
(1869, 'PLASTİK VE KAUÇUK', '22.11.17', '', 0),
(1870, 'PLASTİK VE KAUÇUK', '22.11.18', '', 0),
(1871, 'PLASTİK VE KAUÇUK', '22.11.19', '', 0),
(1872, 'PLASTİK VE KAUÇUK', '22.19.01', '', 0),
(1873, 'PLASTİK VE KAUÇUK', '22.19.02', '', 0),
(1874, 'PLASTİK VE KAUÇUK', '22.19.03', '', 0),
(1875, 'PLASTİK VE KAUÇUK', '22.19.04', '', 0),
(1876, 'PLASTİK VE KAUÇUK', '22.19.06', '', 0),
(1877, 'PLASTİK VE KAUÇUK', '22.19.07', '', 0),
(1878, 'PLASTİK VE KAUÇUK', '22.19.08', '', 0),
(1879, 'PLASTİK VE KAUÇUK', '22.19.09', '', 0),
(1880, 'PLASTİK VE KAUÇUK', '22.19.10', '', 0),
(1881, 'PLASTİK VE KAUÇUK', '22.19.12', '', 0),
(1882, 'PLASTİK VE KAUÇUK', '22.19.13', '', 0),
(1883, 'PLASTİK VE KAUÇUK', '22.21.03', '', 0),
(1884, 'PLASTİK VE KAUÇUK', '22.21.04', '', 0),
(1885, 'PLASTİK VE KAUÇUK', '22.22.43', '', 0),
(1886, 'PLASTİK VE KAUÇUK', '22.23.03', '', 0),
(1887, 'PLASTİK VE KAUÇUK', '22.23.04', '', 0),
(1888, 'PLASTİK VE KAUÇUK', '22.23.05', '', 0),
(1889, 'PLASTİK VE KAUÇUK', '22.23.06', '', 0),
(1890, 'PLASTİK VE KAUÇUK', '22.23.07', '', 0),
(1891, 'PLASTİK VE KAUÇUK', '22.23.08', '', 0),
(1892, 'PLASTİK VE KAUÇUK', '22.23.90', '', 0),
(1893, 'PLASTİK VE KAUÇUK', '22.29.01', '', 0),
(1894, 'PLASTİK VE KAUÇUK', '22.29.03', '', 0),
(1895, 'PLASTİK VE KAUÇUK', '22.29.05', '', 0),
(1896, 'PLASTİK VE KAUÇUK', '22.29.06', '', 0),
(1897, 'PLASTİK VE KAUÇUK', '22.29.07', '', 0),
(1898, 'PLASTİK VE KAUÇUK', '22.29.90', '', 0),
(1899, 'PLASTİK VE KAUÇUK', '25.73.05', '', 0),
(1900, 'PLASTİK VE KAUÇUK', '27.33.02', '', 0),
(1901, 'PLASTİK VE KAUÇUK', '31.09.08', '', 0),
(1902, 'PLASTİK VE KAUÇUK', '32.40.10', '', 0),
(1903, 'PLASTİK VE KAUÇUK', '32.91.90', '', 0),
(1904, 'PLASTİK VE KAUÇUK', '32.99.90', '', 0),
(1905, 'PLASTİK VE KAUÇUK', '46.49.17', '', 0),
(1906, 'PLASTİK VE KAUÇUK', '46.73.15', '', 0),
(1907, 'PLASTİK VE KAUÇUK', '46.73.17', '', 0),
(1908, 'PLASTİK VE KAUÇUK', '46.73.20', '', 0),
(1909, 'PLASTİK VE KAUÇUK', '46.76.04', '', 0),
(1910, 'PLASTİK VE KAUÇUK', '46.76.05', '', 0),
(1911, 'PLASTİK VE KAUÇUK', '47.52.09', '', 0),
(1912, 'PLASTİK VE KAUÇUK', '47.52.21', '', 0),
(1913, 'PLASTİK VE KAUÇUK', '47.59.07', '', 0),
(1914, 'KİMYEVİ MADDE', '10.41.03', '', 0),
(1915, 'KİMYEVİ MADDE', '19.20.16', '', 0),
(1916, 'KİMYEVİ MADDE', '19.20.17', '', 0),
(1917, 'KİMYEVİ MADDE', '19.20.19', '', 0),
(1918, 'KİMYEVİ MADDE', '20.11.01', '', 0),
(1919, 'KİMYEVİ MADDE', '20.12.01', '', 0),
(1920, 'KİMYEVİ MADDE', '20.13.02', '', 0),
(1921, 'KİMYEVİ MADDE', '20.13.03', '', 0),
(1922, 'KİMYEVİ MADDE', '20.13.04', '', 0),
(1923, 'KİMYEVİ MADDE', '20.13.07', '', 0),
(1924, 'KİMYEVİ MADDE', '20.13.90', '', 0),
(1925, 'KİMYEVİ MADDE', '20.14.01', '', 0),
(1926, 'KİMYEVİ MADDE', '20.14.05', '', 0),
(1927, 'KİMYEVİ MADDE', '20.15.01', '', 0),
(1928, 'KİMYEVİ MADDE', '20.15.02', '', 0),
(1929, 'KİMYEVİ MADDE', '20.16.04', '', 0),
(1930, 'KİMYEVİ MADDE', '20.16.05', '', 0),
(1931, 'KİMYEVİ MADDE', '20.20.11', '', 0),
(1932, 'KİMYEVİ MADDE', '20.20.12', '', 0),
(1933, 'KİMYEVİ MADDE', '20.20.13', '', 0),
(1934, 'KİMYEVİ MADDE', '20.20.14', '', 0),
(1935, 'KİMYEVİ MADDE', '20.30.11', '', 0),
(1936, 'KİMYEVİ MADDE', '20.30.12', '', 0),
(1937, 'KİMYEVİ MADDE', '20.30.13', '', 0),
(1938, 'KİMYEVİ MADDE', '20.41.01', '', 0),
(1939, 'KİMYEVİ MADDE', '20.41.03', '', 0),
(1940, 'KİMYEVİ MADDE', '20.41.04', '', 0),
(1941, 'KİMYEVİ MADDE', '20.41.06', '', 0),
(1942, 'KİMYEVİ MADDE', '20.51.21', '', 0),
(1943, 'KİMYEVİ MADDE', '20.51.22', '', 0),
(1944, 'KİMYEVİ MADDE', '20.51.23', '', 0),
(1945, 'KİMYEVİ MADDE', '20.52.05', '', 0),
(1946, 'KİMYEVİ MADDE', '20.53.02', '', 0),
(1947, 'KİMYEVİ MADDE', '20.59.03', '', 0),
(1948, 'KİMYEVİ MADDE', '20.59.04', '', 0),
(1949, 'KİMYEVİ MADDE', '20.59.05', '', 0),
(1950, 'KİMYEVİ MADDE', '20.59.07', '', 0),
(1951, 'KİMYEVİ MADDE', '20.59.08', '', 0),
(1952, 'KİMYEVİ MADDE', '20.59.09', '', 0),
(1953, 'KİMYEVİ MADDE', '20.59.10', '', 0),
(1954, 'KİMYEVİ MADDE', '20.59.11', '', 0),
(1955, 'KİMYEVİ MADDE', '20.59.12', '', 0),
(1956, 'KİMYEVİ MADDE', '20.59.13', '', 0),
(1957, 'KİMYEVİ MADDE', '20.59.14', '', 0),
(1958, 'KİMYEVİ MADDE', '20.59.15', '', 0),
(1959, 'KİMYEVİ MADDE', '25.61.01', '', 0),
(1960, 'KİMYEVİ MADDE', '25.61.02', '', 0),
(1961, 'KİMYEVİ MADDE', '25.61.03', '', 0),
(1962, 'KİMYEVİ MADDE', '32.99.14', '', 0),
(1963, 'KİMYEVİ MADDE', '32.99.15', '', 0),
(1964, 'KİMYEVİ MADDE', '32.99.17', '', 0),
(1965, 'KİMYEVİ MADDE', '43.99.12', '', 0),
(1966, 'KİMYEVİ MADDE', '46.12.01', '', 0),
(1967, 'KİMYEVİ MADDE', '46.12.02', '', 0),
(1968, 'KİMYEVİ MADDE', '46.12.03', '', 0),
(1969, 'KİMYEVİ MADDE', '46.44.04', '', 0),
(1970, 'KİMYEVİ MADDE', '46.73.02', '', 0),
(1971, 'KİMYEVİ MADDE', '46.75.01', '', 0),
(1972, 'KİMYEVİ MADDE', '46.75.02', '', 0),
(1973, 'KİMYEVİ MADDE', '46.75.03', '', 0),
(1974, 'KİMYEVİ MADDE', '46.75.04', '', 0),
(1975, 'KİMYEVİ MADDE', '46.75.05', '', 0),
(1976, 'KİMYEVİ MADDE', '47.52.03', '', 0),
(1977, 'KİMYEVİ MADDE', '47.76.03', '', 0),
(1978, 'ORMAN ÜRÜNLERİ', '02.40.01', '', 0),
(1979, 'ORMAN ÜRÜNLERİ', '02.40.02', '', 0),
(1980, 'ORMAN ÜRÜNLERİ', '16.10.01', '', 0),
(1981, 'ORMAN ÜRÜNLERİ', '16.10.02', '', 0),
(1982, 'ORMAN ÜRÜNLERİ', '16.10.03', '', 0),
(1983, 'ORMAN ÜRÜNLERİ', '16.10.06', '', 0),
(1984, 'ORMAN ÜRÜNLERİ', '16.21.01', '', 0),
(1985, 'ORMAN ÜRÜNLERİ', '16.21.02', '', 0),
(1986, 'ORMAN ÜRÜNLERİ', '16.22.01', '', 0),
(1987, 'ORMAN ÜRÜNLERİ', '16.23.90', '', 0),
(1988, 'ORMAN ÜRÜNLERİ', '16.24.01', '', 0),
(1989, 'ORMAN ÜRÜNLERİ', '16.24.02', '', 0),
(1990, 'ORMAN ÜRÜNLERİ', '16.24.03', '', 0),
(1991, 'ORMAN ÜRÜNLERİ', '16.29.02', '', 0),
(1992, 'ORMAN ÜRÜNLERİ', '16.29.05', '', 0),
(1993, 'ORMAN ÜRÜNLERİ', '16.29.07', '', 0),
(1994, 'ORMAN ÜRÜNLERİ', '46.13.02', '', 0),
(1995, 'ORMAN ÜRÜNLERİ', '46.73.01', '', 0),
(1996, 'ORMAN ÜRÜNLERİ', '46.73.12', '', 0),
(1997, 'ORMAN ÜRÜNLERİ', '47.52.10', '', 0),
(1998, 'MOBİLYA', '31.01.01', '', 0),
(1999, 'MOBİLYA', '31.01.02', '', 0),
(2000, 'MOBİLYA', '31.01.03', '', 0),
(2001, 'MOBİLYA', '31.01.04', '', 0),
(2002, 'MOBİLYA', '31.02.01', '', 0),
(2003, 'MOBİLYA', '31.03.01', '', 0),
(2004, 'MOBİLYA', '31.03.02', '', 0),
(2005, 'MOBİLYA', '31.09.01', '', 0),
(2006, 'MOBİLYA', '31.09.02', '', 0),
(2007, 'MOBİLYA', '31.09.03', '', 0),
(2008, 'MOBİLYA', '31.09.04', '', 0),
(2009, 'MOBİLYA', '31.09.05', '', 0),
(2010, 'MOBİLYA', '31.09.06', '', 0),
(2011, 'MOBİLYA', '31.09.07', '', 0),
(2012, 'MOBİLYA', '43.32.01', '', 0),
(2013, 'MOBİLYA', '43.32.02', '', 0),
(2014, 'MOBİLYA', '43.32.03', '', 0),
(2015, 'MOBİLYA', '46.15.01', '', 0),
(2016, 'MOBİLYA', '46.47.01', '', 0),
(2017, 'MOBİLYA', '46.65.01', '', 0),
(2018, 'MOBİLYA', '47.59.03', '', 0),
(2019, 'MOBİLYA', '47.59.08', '', 0),
(2020, 'MOBİLYA', '47.59.10', '', 0),
(2021, 'MOBİLYA', '47.59.11', '', 0),
(2022, 'MOBİLYA', '47.89.01', '', 0),
(2023, 'MOBİLYA', '95.24.01', '', 0),
(2024, 'BAKLAVA, PASTA VE ŞEKERLİ MAMÜLLER', '10.39.03', '', 0),
(2025, 'BAKLAVA, PASTA VE ŞEKERLİ MAMÜLLER', '10.41.06', '', 0),
(2026, 'BAKLAVA, PASTA VE ŞEKERLİ MAMÜLLER', '10.71.01', '', 0),
(2027, 'BAKLAVA, PASTA VE ŞEKERLİ MAMÜLLER', '10.71.03', '', 0),
(2028, 'BAKLAVA, PASTA VE ŞEKERLİ MAMÜLLER', '10.72.01', '', 0),
(2029, 'BAKLAVA, PASTA VE ŞEKERLİ MAMÜLLER', '10.72.02', '', 0),
(2030, 'BAKLAVA, PASTA VE ŞEKERLİ MAMÜLLER', '10.72.03', '', 0),
(2031, 'BAKLAVA, PASTA VE ŞEKERLİ MAMÜLLER', '10.81.01', '', 0),
(2032, 'BAKLAVA, PASTA VE ŞEKERLİ MAMÜLLER', '10.81.03', '', 0),
(2033, 'BAKLAVA, PASTA VE ŞEKERLİ MAMÜLLER', '10.82.01', '', 0),
(2034, 'BAKLAVA, PASTA VE ŞEKERLİ MAMÜLLER', '10.82.02', '', 0),
(2035, 'BAKLAVA, PASTA VE ŞEKERLİ MAMÜLLER', '10.82.03', '', 0),
(2036, 'BAKLAVA, PASTA VE ŞEKERLİ MAMÜLLER', '10.82.04', '', 0),
(2037, 'BAKLAVA, PASTA VE ŞEKERLİ MAMÜLLER', '10.82.05', '', 0),
(2038, 'BAKLAVA, PASTA VE ŞEKERLİ MAMÜLLER', '10.82.06', '', 0),
(2039, 'BAKLAVA, PASTA VE ŞEKERLİ MAMÜLLER', '10.82.07', '', 0),
(2040, 'BAKLAVA, PASTA VE ŞEKERLİ MAMÜLLER', '10.83.01', '', 0),
(2041, 'BAKLAVA, PASTA VE ŞEKERLİ MAMÜLLER', '10.83.02', '', 0),
(2042, 'BAKLAVA, PASTA VE ŞEKERLİ MAMÜLLER', '10.83.03', '', 0),
(2043, 'BAKLAVA, PASTA VE ŞEKERLİ MAMÜLLER', '11.07.04', '', 0),
(2044, 'BAKLAVA, PASTA VE ŞEKERLİ MAMÜLLER', '46.36.01', '', 0),
(2045, 'BAKLAVA, PASTA VE ŞEKERLİ MAMÜLLER', '47.24.02', '', 0),
(2046, 'BAKLAVA, PASTA VE ŞEKERLİ MAMÜLLER', '47.24.03', '', 0),
(2047, 'BAKLAVA, PASTA VE ŞEKERLİ MAMÜLLER', '47.81.11', '', 0),
(2048, 'BAKLAVA, PASTA VE ŞEKERLİ MAMÜLLER', '56.10.09', '', 0),
(2049, 'GÖZLÜKÇÜLÜK VE SAATÇİLİK', '15.12.10', '', 0),
(2050, 'GÖZLÜKÇÜLÜK VE SAATÇİLİK', '15.12.11', '', 0),
(2051, 'GÖZLÜKÇÜLÜK VE SAATÇİLİK', '23.19.02', '', 0),
(2052, 'GÖZLÜKÇÜLÜK VE SAATÇİLİK', '26.51.04', '', 0),
(2053, 'GÖZLÜKÇÜLÜK VE SAATÇİLİK', '26.51.08', '', 0),
(2054, 'GÖZLÜKÇÜLÜK VE SAATÇİLİK', '26.51.90', '', 0),
(2055, 'GÖZLÜKÇÜLÜK VE SAATÇİLİK', '26.52.03', '', 0),
(2056, 'GÖZLÜKÇÜLÜK VE SAATÇİLİK', '26.52.04', '', 0),
(2057, 'GÖZLÜKÇÜLÜK VE SAATÇİLİK', '32.50.01', '', 0),
(2058, 'GÖZLÜKÇÜLÜK VE SAATÇİLİK', '32.50.08', '', 0),
(2059, 'GÖZLÜKÇÜLÜK VE SAATÇİLİK', '46.43.11', '', 0),
(2060, 'GÖZLÜKÇÜLÜK VE SAATÇİLİK', '46.48.02', '', 0),
(2061, 'GÖZLÜKÇÜLÜK VE SAATÇİLİK', '47.77.03', '', 0),
(2062, 'GÖZLÜKÇÜLÜK VE SAATÇİLİK', '47.78.03', '', 0),
(2063, 'GÖZLÜKÇÜLÜK VE SAATÇİLİK', '47.78.07', '', 0),
(2064, 'GÖZLÜKÇÜLÜK VE SAATÇİLİK', '95.25.01', '', 0),
(2065, 'ET VE ET ÜRÜNLERİ', '01.42.09', '', 0),
(2066, 'ET VE ET ÜRÜNLERİ', '01.44.01', '', 0),
(2067, 'ET VE ET ÜRÜNLERİ', '01.45.01', '', 0),
(2068, 'ET VE ET ÜRÜNLERİ', '01.46.01', '', 0),
(2069, 'ET VE ET ÜRÜNLERİ', '01.47.01', '', 0),
(2070, 'ET VE ET ÜRÜNLERİ', '01.49.05', '', 0),
(2071, 'ET VE ET ÜRÜNLERİ', '01.70.01', '', 0),
(2072, 'ET VE ET ÜRÜNLERİ', '01.70.02', '', 0),
(2073, 'ET VE ET ÜRÜNLERİ', '10.11.01', '', 0),
(2074, 'ET VE ET ÜRÜNLERİ', '10.12.01', '', 0),
(2075, 'ET VE ET ÜRÜNLERİ', '10.12.02', '', 0),
(2076, 'ET VE ET ÜRÜNLERİ', '10.12.03', '', 0),
(2077, 'ET VE ET ÜRÜNLERİ', '10.13.01', '', 0),
(2078, 'ET VE ET ÜRÜNLERİ', '10.13.02', '', 0),
(2079, 'ET VE ET ÜRÜNLERİ', '10.13.03', '', 0),
(2080, 'ET VE ET ÜRÜNLERİ', '10.13.04', '', 0),
(2081, 'ET VE ET ÜRÜNLERİ', '46.11.02', '', 0),
(2082, 'ET VE ET ÜRÜNLERİ', '46.23.01', '', 0),
(2083, 'ET VE ET ÜRÜNLERİ', '46.23.02', '', 0),
(2084, 'ET VE ET ÜRÜNLERİ', '46.32.01', '', 0),
(2085, 'ET VE ET ÜRÜNLERİ', '46.32.02', '', 0),
(2086, 'ET VE ET ÜRÜNLERİ', '46.32.03', '', 0),
(2087, 'ET VE ET ÜRÜNLERİ', '46.32.04', '', 0),
(2088, 'ET VE ET ÜRÜNLERİ', '47.22.01', '', 0),
(2089, 'ET VE ET ÜRÜNLERİ', '47.22.02', '', 0),
(2090, 'ET VE ET ÜRÜNLERİ', '47.78.28', '', 0),
(2091, 'ET VE ET ÜRÜNLERİ', '47.78.29', '', 0),
(2092, 'ET VE ET ÜRÜNLERİ', '47.81.03', '', 0),
(2093, 'ET VE ET ÜRÜNLERİ', '47.89.03', '', 0),
(2094, 'ET VE ET ÜRÜNLERİ', '47.89.14', '', 0),
(2095, 'KARGO, POSTA VE DEPOLAMA', '52.10.02', '', 0),
(2096, 'KARGO, POSTA VE DEPOLAMA', '52.10.03', '', 0),
(2097, 'KARGO, POSTA VE DEPOLAMA', '52.10.04', '', 0),
(2098, 'KARGO, POSTA VE DEPOLAMA', '52.10.05', '', 0),
(2099, 'KARGO, POSTA VE DEPOLAMA', '52.10.90', '', 0),
(2100, 'KARGO, POSTA VE DEPOLAMA', '52.21.06', '', 0),
(2101, 'KARGO, POSTA VE DEPOLAMA', '52.24.08', '', 0),
(2102, 'KARGO, POSTA VE DEPOLAMA', '52.24.09', '', 0),
(2103, 'KARGO, POSTA VE DEPOLAMA', '52.24.10', '', 0),
(2104, 'KARGO, POSTA VE DEPOLAMA', '52.24.11', '', 0),
(2105, 'KARGO, POSTA VE DEPOLAMA', '53.10.01', '', 0),
(2106, 'KARGO, POSTA VE DEPOLAMA', '53.20.08', '', 0),
(2107, 'KARGO, POSTA VE DEPOLAMA', '53.20.09', '', 0),
(2108, 'KARGO, POSTA VE DEPOLAMA', '53.20.10', '', 0),
(2109, 'LPG, SIVILAŞTIRILMIŞ VE SIKIŞTIRILMIŞ GAZLAR', '19.20.15', '', 0),
(2110, 'LPG, SIVILAŞTIRILMIŞ VE SIKIŞTIRILMIŞ GAZLAR', '46.71.03', '', 0),
(2111, 'LPG, SIVILAŞTIRILMIŞ VE SIKIŞTIRILMIŞ GAZLAR', '47.78.10', '', 0),
(2112, 'LPG, SIVILAŞTIRILMIŞ VE SIKIŞTIRILMIŞ GAZLAR', '49.50.04', '', 0),
(2113, 'DOKUMA', '13.20.14', '', 0),
(2114, 'DOKUMA', '13.20.16', '', 0),
(2115, 'DOKUMA', '13.20.17', '', 0),
(2116, 'DOKUMA', '13.20.19', '', 0),
(2117, 'DOKUMA', '13.20.20', '', 0),
(2118, 'DOKUMA', '13.20.21', '', 0),
(2119, 'DOKUMA', '13.20.22', '', 0),
(2120, 'DOKUMA', '13.20.23', '', 0),
(2121, 'DOKUMA', '13.20.24', '', 0),
(2122, 'DOKUMA', '13.92.05', '', 0),
(2123, 'DOKUMA', '13.96.01', '', 0),
(2124, 'DOKUMA', '13.96.06', '', 0),
(2125, 'DOKUMA', '14.19.02', '', 0),
(2126, 'HUBUBAT, BAKLİYAT, KURUYEMİŞ VE KURU MEYVE', '01.11.07', '', 0),
(2127, 'HUBUBAT, BAKLİYAT, KURUYEMİŞ VE KURU MEYVE', '01.11.12', '', 0),
(2128, 'HUBUBAT, BAKLİYAT, KURUYEMİŞ VE KURU MEYVE', '01.11.14', '', 0),
(2129, 'HUBUBAT, BAKLİYAT, KURUYEMİŞ VE KURU MEYVE', '01.12.14', '', 0),
(2130, 'HUBUBAT, BAKLİYAT, KURUYEMİŞ VE KURU MEYVE', '01.25.09', '', 0),
(2131, 'HUBUBAT, BAKLİYAT, KURUYEMİŞ VE KURU MEYVE', '01.63.02', '', 0),
(2132, 'HUBUBAT, BAKLİYAT, KURUYEMİŞ VE KURU MEYVE', '10.39.02', '', 0),
(2133, 'HUBUBAT, BAKLİYAT, KURUYEMİŞ VE KURU MEYVE', '10.39.06', '', 0),
(2134, 'HUBUBAT, BAKLİYAT, KURUYEMİŞ VE KURU MEYVE', '46.21.02', '', 0),
(2135, 'HUBUBAT, BAKLİYAT, KURUYEMİŞ VE KURU MEYVE', '46.21.03', '', 0),
(2136, 'HUBUBAT, BAKLİYAT, KURUYEMİŞ VE KURU MEYVE', '46.21.08', '', 0),
(2137, 'HUBUBAT, BAKLİYAT, KURUYEMİŞ VE KURU MEYVE', '46.31.01', '', 0),
(2138, 'HUBUBAT, BAKLİYAT, KURUYEMİŞ VE KURU MEYVE', '46.31.08', '', 0),
(2139, 'HUBUBAT, BAKLİYAT, KURUYEMİŞ VE KURU MEYVE', '46.31.09', '', 0),
(2140, 'HUBUBAT, BAKLİYAT, KURUYEMİŞ VE KURU MEYVE', '46.31.10', '', 0),
(2141, 'HUBUBAT, BAKLİYAT, KURUYEMİŞ VE KURU MEYVE', '46.31.11', '', 0),
(2142, 'HUBUBAT, BAKLİYAT, KURUYEMİŞ VE KURU MEYVE', '46.31.12', '', 0),
(2143, 'HUBUBAT, BAKLİYAT, KURUYEMİŞ VE KURU MEYVE', '47.21.04', '', 0),
(2144, 'HUBUBAT, BAKLİYAT, KURUYEMİŞ VE KURU MEYVE', '47.21.05', '', 0),
(2145, 'HUBUBAT, BAKLİYAT, KURUYEMİŞ VE KURU MEYVE', '47.29.06', '', 0),
(2146, 'HUBUBAT, BAKLİYAT, KURUYEMİŞ VE KURU MEYVE', '47.81.90', '', 0),
(2147, 'FOTOĞRAFÇILIK', '20.59.01', '', 0),
(2148, 'FOTOĞRAFÇILIK', '26.70.16', '', 0),
(2149, 'FOTOĞRAFÇILIK', '26.70.19', '', 0),
(2150, 'FOTOĞRAFÇILIK', '27.40.01', '', 0),
(2151, 'FOTOĞRAFÇILIK', '33.13.03', '', 0),
(2152, 'FOTOĞRAFÇILIK', '46.43.10', '', 0),
(2153, 'FOTOĞRAFÇILIK', '46.49.23', '', 0),
(2154, 'FOTOĞRAFÇILIK', '46.49.24', '', 0),
(2155, 'FOTOĞRAFÇILIK', '47.78.22', '', 0),
(2156, 'FOTOĞRAFÇILIK', '47.89.07', '', 0),
(2157, 'FOTOĞRAFÇILIK', '74.20.22', '', 0),
(2158, 'FOTOĞRAFÇILIK', '74.20.25', '', 0),
(2159, 'FOTOĞRAFÇILIK', '74.20.26', '', 0),
(2160, 'FOTOĞRAFÇILIK', '74.20.27', '', 0),
(2161, 'FOTOĞRAFÇILIK', '74.20.28', '', 0),
(2162, 'FOTOĞRAFÇILIK', '74.20.29', '', 0),
(2163, 'FOTOĞRAFÇILIK', '74.20.90', '', 0),
(2164, 'FOTOĞRAFÇILIK', '96.09.16', '', 0),
(2165, 'ZÜCCACİYE', '16.29.01', '', 0),
(2166, 'ZÜCCACİYE', '16.29.03', '', 0),
(2167, 'ZÜCCACİYE', '23.13.01', '', 0),
(2168, 'ZÜCCACİYE', '23.13.02', '', 0),
(2169, 'ZÜCCACİYE', '23.41.01', '', 0),
(2170, 'ZÜCCACİYE', '46.44.01', '', 0),
(2171, 'ZÜCCACİYE', '47.59.01', '', 0),
(2172, 'ZÜCCACİYE', '47.59.04', '', 0),
(2173, 'DOĞAL VE İŞLENMİŞ KATI YAKIT', '02.10.01', '', 0),
(2174, 'DOĞAL VE İŞLENMİŞ KATI YAKIT', '02.20.01', '', 0),
(2175, 'DOĞAL VE İŞLENMİŞ KATI YAKIT', '05.10.01', '', 0),
(2176, 'DOĞAL VE İŞLENMİŞ KATI YAKIT', '05.20.01', '', 0),
(2177, 'DOĞAL VE İŞLENMİŞ KATI YAKIT', '08.92.01', '', 0),
(2178, 'DOĞAL VE İŞLENMİŞ KATI YAKIT', '16.29.90', '', 0),
(2179, 'DOĞAL VE İŞLENMİŞ KATI YAKIT', '19.10.10', '', 0),
(2180, 'DOĞAL VE İŞLENMİŞ KATI YAKIT', '19.10.11', '', 0),
(2181, 'DOĞAL VE İŞLENMİŞ KATI YAKIT', '19.20.12', '', 0),
(2182, 'DOĞAL VE İŞLENMİŞ KATI YAKIT', '20.14.04', '', 0),
(2183, 'DOĞAL VE İŞLENMİŞ KATI YAKIT', '35.21.02', '', 0),
(2184, 'DOĞAL VE İŞLENMİŞ KATI YAKIT', '46.71.02', '', 0),
(2185, 'DOĞAL VE İŞLENMİŞ KATI YAKIT', '47.78.02', '', 0),
(2186, 'DOĞAL VE İŞLENMİŞ KATI YAKIT', '47.99.12', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table 't_org_ind_reg'
--

CREATE SEQUENCE t_org_ind_reg_seq;

CREATE TABLE IF NOT EXISTS t_org_ind_reg (
  id int NOT NULL DEFAULT NEXTVAL ('t_org_ind_reg_seq'),
  name varchar(200) NOT NULL,
  active smallint NOT NULL,
  country varchar(50) DEFAULT NULL,
  PRIMARY KEY (id)
)    ;
 
ALTER SEQUENCE t_org_ind_reg_seq RESTART WITH 4;

--
-- Dumping data for table 't_org_ind_reg'
--

INSERT INTO t_org_ind_reg (id, name, active, country) VALUES
(1, 'Example 1', 1, 'Ankara'),
(2, 'Example 2', 1, 'İstanbul'),
(3, 'Example 3', 1, 'İzmir');

-- --------------------------------------------------------

--
-- Table structure for table 't_prcss'
--

CREATE SEQUENCE t_prcss_seq;

CREATE TABLE IF NOT EXISTS t_prcss (
  id int NOT NULL DEFAULT NEXTVAL ('t_prcss_seq'),
  name varchar(200) NOT NULL,
  name_tr varchar(200) DEFAULT NULL,
  mother_id int DEFAULT NULL,
  active smallint NOT NULL,
  layer int NOT NULL,
  PRIMARY KEY (id)
)    ;
 
ALTER SEQUENCE t_prcss_seq RESTART WITH 303;

CREATE INDEX mother_id ON t_prcss (mother_id);

--
-- Dumping data for table 't_prcss'
--

INSERT INTO t_prcss (id, name, name_tr, mother_id, active, layer) VALUES
(1, 'Forming Processes', 'Şekillendirme Süreçleri', NULL, 1, 1),
(2, 'machining Processes', 'Talaşlı İmalat üreçleri', NULL, 1, 1),
(3, 'Casting Processes', 'Döküm Süreçleri', NULL, 1, 1),
(4, 'Joining Processes', 'Birleştirme Süreçleri', NULL, 1, 1),
(5, 'Molding', 'Kalıp Süreçleri', NULL, 1, 1),
(6, 'Rapid Manufacturing Processes', 'Hızlı Prototip Üretim Süreçleri', NULL, 1, 1),
(7, 'Other', 'Diğer İmalat Süreçleri', NULL, 1, 1),
(8, 'Forging', 'Dövme', 1, 1, 2),
(9, 'Forming and Shaping of Ceramics', 'Seramik Şekillendirme', 1, 1, 2),
(10, 'Powder Metallurgy', 'Toz Metalurjisi', 1, 1, 2),
(11, 'Pressing', 'Sıkıştırma-Presleme', 1, 1, 2),
(12, 'Processing of Plastics and Composite Materials', 'Plastik ve Kompozit Malzeme İmalı', 1, 1, 2),
(13, 'Rolling', 'Haddeleme', 1, 1, 2),
(14, 'Sheet Metal Forming', 'Saç Şekillendirme', 1, 1, 2),
(15, 'Cold Sizing', 'Soğuk Ebatlandirma', 1, 1, 2),
(16, 'End Tube forming', 'Boru ile Şekillendirme', 1, 1, 2),
(17, 'Guering Process', 'Guering İşleme', 1, 1, 2),
(18, 'Hot Metal Gas Forming', 'Sıcak Metal Gazlarla Şekillendirme', 1, 1, 2),
(19, 'Wheelon Process', 'Wheelon İşleme', 1, 1, 2),
(20, 'Bending', 'Eğme', 1, 1, 2),
(21, 'Curling', 'kenar kıvırma', 1, 1, 2),
(22, 'Decambering', 'Bombe Giderme', 1, 1, 2),
(23, 'Electro Forming', 'Elektrikli Şekillendirme', 1, 1, 2),
(24, 'Extrusion', 'Ekstrüzyon', 1, 1, 2),
(25, 'Flanging', 'kenar bükme', 1, 1, 2),
(26, 'Flattering', 'Flattering', 1, 1, 2),
(27, 'Hubbing', 'ıstampa ile basma', 1, 1, 2),
(28, 'Ironing', 'incelterek çekme', 1, 1, 2),
(29, 'Redrawing', 'Yeniden çekme', 1, 1, 2),
(30, 'Seaming', 'katlamalı dikiş', 1, 1, 2),
(31, 'Staking', 'punta ile perçinleme', 1, 1, 2),
(32, 'Straightening', 'doğrultma', 1, 1, 2),
(33, 'Swaging', 'tokaçlama', 1, 1, 2),
(34, 'Machining Center', 'Machining Center', 2, 1, 2),
(35, 'Turning', 'Tornalama', 2, 1, 2),
(36, 'Milling', 'Freze', 2, 1, 2),
(37, 'Shaping', 'Şekillendirme', 2, 1, 2),
(38, 'Drilling', 'Delme Tz.', 2, 1, 2),
(39, 'Broaching', 'Broşlama- Tığ Çekme', 2, 1, 2),
(40, 'Countersinking', 'Havşa Açma', 2, 1, 2),
(41, 'Gashing', 'Gashing', 2, 1, 2),
(42, 'Grinding', 'Taşlama Tez.', 2, 1, 2),
(43, 'Hobbing', 'Kılavuz Açma', 2, 1, 2),
(44, 'Honning', 'Honlama- Bileme Tez.n', 2, 1, 2),
(45, 'Routing', 'Routing', 2, 1, 2),
(46, 'Sawing', 'Testere', 2, 1, 2),
(47, 'Tapping', 'kılavuzla dış açma', 2, 1, 2),
(48, 'Reaming', 'Raybalama', 2, 1, 2),
(49, 'Planing', 'Rendeleme', 2, 1, 2),
(50, 'Finishing', 'Perdah', 2, 1, 2),
(51, 'Non Traditional Machinig', 'Geleneksel Olmayan Süreçler', 2, 1, 2),
(52, 'Micro Machining', 'Mikro Talaşlı İmalat', 2, 1, 2),
(53, 'Centrifugal Casting Processes', 'Santrifüjal (Merkez-kaç) Döküm Süreci', 3, 1, 2),
(54, 'Continuous Casting Processes', 'Sürekli Döküm Süreci', 3, 1, 2),
(55, 'Die Casting Processes', 'Press Döküm', 3, 1, 2),
(56, 'Evaporative Pattern Casting Processes', 'Buharlaşan Model', 3, 1, 2),
(57, 'Investment Casting', 'Eriyen Kalıpla Döküm', 3, 1, 2),
(58, 'Low Pressure', 'Düşük Basınçlı', 3, 1, 2),
(59, 'Permanent Mold Casting', 'Daimi Kalıp', 3, 1, 2),
(60, 'Plastic Mold', 'Plastik Kalıb', 3, 1, 2),
(61, 'Resin Casting', 'Rezin Döküm', 3, 1, 2),
(62, 'Sand Casting', 'Kum Döküm', 3, 1, 2),
(63, 'Shell Casting', 'Kabuk Döküm', 3, 1, 2),
(64, 'Slush', 'Islak Kalıb', 3, 1, 2),
(65, 'Spray Forming', 'Püskürtümlü Şekillendirme', 3, 1, 2),
(66, 'Adhesive Bonding', 'Yapışkanlı Bağlama', 4, 1, 2),
(67, 'Brazing', 'Lehimleme', 4, 1, 2),
(68, 'Fastening', 'Bağlama', 4, 1, 2),
(69, 'Press Fitting', 'Baskılı Geçirme', 4, 1, 2),
(70, 'Sintering', 'Pekiştirme- Zintrleme', 4, 1, 2),
(71, 'Soldering', 'Lehimleme', 4, 1, 2),
(72, 'Welding', 'Kaynak', 4, 1, 2),
(73, 'Plastics', 'Plastik Kalıpları', 5, 1, 2),
(74, 'Shrink Fitting', 'Çekerek Oturtma (Kalıpta)', 5, 1, 2),
(75, 'Shrink Wrapping', 'Çekerek Sarma (Kalıpta)', 5, 1, 2),
(76, 'Fused Deposition Molding', 'Eritilen Model', 6, 1, 2),
(77, 'Laminated Object Manufacturing', 'Katmanlı Mal Üretimi', 6, 1, 2),
(78, 'Laser Engineered Net Shaping', 'Hassas Lazerli Şekillendirme', 6, 1, 2),
(79, 'Selective Laser Sintering', 'Seçilmeli Lazer Zinterleme', 6, 1, 2),
(80, 'Stereo Lithography', 'Stereo Litografi', 6, 1, 2),
(81, 'Three Dimentional Printing', 'Üç Boyutlu Yazma (Baskı)', 6, 1, 2),
(82, 'Crushing', 'Sıkıştırmalı- Kırıcı', 7, 1, 2),
(83, 'Mill', 'Haddelemek', 7, 1, 2),
(84, 'Mining', 'Madencilik', 7, 1, 2),
(85, 'Wood Working', 'Ağaç İşlemen', 7, 1, 2),
(86, 'Drop Forge Forging', 'Drop Forge Forging', 8, 1, 3),
(87, 'Forging Cored', 'doldurma dövmesi', 8, 1, 3),
(88, 'Hammer Forge', 'çekiçle Dövme', 8, 1, 3),
(89, 'High Energy Rate Forging', 'yüksek hızla dövme', 8, 1, 3),
(90, 'Incremental Forging', 'Artan Dövme', 8, 1, 3),
(91, 'No Draft Forging', 'sıkı paylı dövme', 8, 1, 3),
(92, 'Powder Forging', 'toz dövmesi', 8, 1, 3),
(93, 'Press Forging', 'preste dövme', 8, 1, 3),
(94, 'Smith Forging', 'demirci dövmesi', 8, 1, 3),
(95, 'Upset Forging', 'açık kalıpla yığarak dövme', 8, 1, 3),
(96, 'Compacting and Sintering', 'Sıkıştırma ve Zinterleme', 10, 1, 3),
(97, 'Hot Isostatic Pressing', 'İzostatik Sıcak Sıkıştırma', 10, 1, 3),
(98, 'Metal Injection Molding', 'Metal Enjeksyonlu Kalıplama', 10, 1, 3),
(99, 'Spray Forming (Molding)', 'Püskürtmeli Şekillendirme (Kalıpta)', 10, 1, 3),
(100, 'Deep Drawing', 'derin çekme', 11, 1, 3),
(101, 'Pressing Blanking', 'Basarak Boşaltma', 11, 1, 3),
(102, 'Stretch Forming', 'gererek şekillendirme', 11, 1, 3),
(103, 'Embossing', 'Kabartma', 11, 1, 3),
(104, 'Cold Rolling', 'Soğuk Haddeleme', 13, 1, 3),
(105, 'Cross Rolling', 'Çapraz Haddeleme', 13, 1, 3),
(106, 'Cryo Rolling', 'Cryo Haddeleme', 13, 1, 3),
(107, 'Hot Rolling', 'Sıcak Haddeleme', 13, 1, 3),
(108, 'Orbital Rolling', 'Orbital Haddeleme', 13, 1, 3),
(109, 'Ring Rolling', 'Halkalı Haddeleme', 13, 1, 3),
(110, 'Shape Rolling', 'şekil Haddeleme', 13, 1, 3),
(111, 'Sheet Metal Rolling', 'Saç Metal Haddeleme', 13, 1, 3),
(112, 'Thread Rolling', 'Diş Haddeleme', 13, 1, 3),
(113, 'Transverse Rolling', 'Ters Haddeleme', 13, 1, 3),
(114, 'Flat Rolling', 'Yassı Haddeleme', 13, 1, 3),
(115, 'Explosive Forming', 'Patlayıcıyla Şekillendirme', 14, 1, 3),
(116, 'Magnetic Pulse', 'Magnetik Etki', 14, 1, 3),
(117, 'Peening', 'Peening', 14, 1, 3),
(118, 'Spinning', 'Sıvama', 14, 1, 3),
(119, 'Drawing', 'Çekme', 14, 1, 3),
(120, 'Incremental', 'Kademli', 14, 1, 3),
(121, 'Rubber', 'Kauçuk', 14, 1, 3),
(122, 'Sheraing', 'Kesme', 14, 1, 3),
(123, 'Cut Off Parting', 'Kanal Açma', 35, 1, 3),
(124, 'Facing', 'Alin Tornalama', 35, 1, 3),
(125, 'Knurling', 'Kertilkleme', 35, 1, 3),
(126, 'Lathe', 'Torna', 35, 1, 3),
(127, 'Spinning', 'dönerli sıvama', 35, 1, 3),
(128, 'Boring', 'Delik İşleme', 35, 1, 3),
(129, 'Shaping Horizontal', 'Yatay Şekillendirme', 37, 1, 3),
(130, 'Special Purpose Shaping', 'Özel Amaçlı Şekillendirme', 37, 1, 3),
(131, 'Vertical Shaping', 'Dik Şekillendirme', 37, 1, 3),
(132, 'Double Housing', 'çift sütunlu', 49, 1, 3),
(133, 'Edgeor Plate Planing', 'Kenar rendeleme', 49, 1, 3),
(134, 'Open Side Planing', 'Açik Kenar Rendeleme', 49, 1, 3),
(135, 'Pit Type Planing', 'Pit Tipi Rendeleme', 49, 1, 3),
(136, 'Abrasive Blasting', 'Aşındırıcı Püskürtme', 50, 1, 3),
(137, 'Spindle Finishing', 'İşmilli Perdah', 50, 1, 3),
(138, 'Super Finishing', 'Hassas Perdahlama', 50, 1, 3),
(139, 'Vibratory Finishing', 'titreşimli Perdah', 50, 1, 3),
(140, 'Wire Brushing', 'telli fırçalama', 50, 1, 3),
(141, 'Buffling', 'Cilalama', 50, 1, 3),
(142, 'Burnishing', 'baskı takımı veya makarası ile perdahlama', 50, 1, 3),
(143, 'Etching', 'asitle aşındırma', 50, 1, 3),
(144, 'Linsing', 'Linsing', 50, 1, 3),
(145, 'Plating', 'kaplama', 50, 1, 3),
(146, 'Polishing', 'polisaj', 50, 1, 3),
(147, 'EDM', 'Elektrik Boşaltımlı İşleme (EDM)', 51, 1, 3),
(148, 'ECM', 'ECM', 51, 1, 3),
(149, 'AFM', 'AFM', 51, 1, 3),
(150, 'USM', 'USM', 51, 1, 3),
(151, 'Abrasive Belt', 'Aşındırıcı Kayış', 51, 1, 3),
(152, 'Abrasive Jet Machining', 'aşındırıcı püskürtümlü talaşlı imalat', 51, 1, 3),
(153, 'Bio Machining', 'Bio Talaşlı İmalat', 51, 1, 3),
(154, 'Electro Chemical Grinding', 'Elektrikli Kimyasal Taşlama', 51, 1, 3),
(155, 'Electro Plating', 'Elektrolizle Kaplama', 51, 1, 3),
(156, 'Electro Polishing', 'Elektro Polisaj', 51, 1, 3),
(157, 'Laser Cutting', 'lazer kesimi', 51, 1, 3),
(158, 'Magnetic Field Assissted Finishing', 'Manyetik Alan Yardımı ile perdahlama', 51, 1, 3),
(159, 'Photo Chemical', 'Işıl Kimyasal İşleme', 51, 1, 3),
(160, 'Ultrasonic Machining', 'Ses Üstü Dalgalarıyla Talaş Alma', 51, 1, 3),
(161, 'Chemical', 'Kimyasal', 51, 1, 3),
(162, 'Water Jet Cutting', 'Su Püskürtümlü Kesme', 51, 1, 3),
(163, 'Full Mold Casting', 'Bütün Kalıp', 56, 1, 3),
(164, 'Lost Foam Casting', 'Kaybolan Köpük', 56, 1, 3),
(165, 'Lost Foam Investment Casting', 'Eriyen Köpüklü Hassas Dökümn', 57, 1, 3),
(166, 'Adhesive alloys', 'Yapışkanlı Alaşımlar', 66, 1, 3),
(167, 'Epoxy', 'Tutkal- Epoksi', 66, 1, 3),
(168, 'Miscellaneous', 'Çeşitli- Diğer', 66, 1, 3),
(169, 'Modified Epoxy', 'Değişime Uğramış Epoksi', 66, 1, 3),
(170, 'Phenolics', 'Fenolikler', 66, 1, 3),
(171, 'Polyurethane', 'Poliüretan', 66, 1, 3),
(172, 'Thermo Setting- Thermo Plastic', 'Termoset-Termoplastik', 66, 1, 3),
(173, 'Dip Brazing', 'Daldırma Lehimleme', 67, 1, 3),
(174, 'Furnace Brazing', 'Fırınlamalı Pirinç Kaynağı', 67, 1, 3),
(175, 'Induction Brazing', 'Endüksyon Lehimleme', 67, 1, 3),
(176, 'Torch', 'Meşale Lehimleme', 67, 1, 3),
(177, 'Clinching', 'Perçinli Çivileme', 68, 1, 3),
(178, 'Nailing', 'Çivileme', 68, 1, 3),
(179, 'Nutand Bolts', 'Somun ve Cıvata', 68, 1, 3),
(180, 'Pining', 'İliştirmek', 68, 1, 3),
(181, 'Riveting', 'Perçinleme', 68, 1, 3),
(182, 'Screwing', 'Diş Açma- Vidalama', 68, 1, 3),
(183, 'Stapling', 'Zımbalama', 68, 1, 3),
(184, 'Stitching', 'Dikme', 68, 1, 3),
(185, 'Dip Soldering', 'Daldırma Lehimleme (Soldering)', 67, 1, 3),
(186, 'Hot Plate Soldering', 'Kızgın Levha Lehimlemesi', 67, 1, 3),
(187, 'Induction Solderin', 'Endüksyon Lehimleme', 67, 1, 3),
(188, 'Iron Soldering', 'Demir Lehimleme', 67, 1, 3),
(189, 'Oven Soldering', 'Fırında Lehimleme', 67, 1, 3),
(190, 'Ultrasonic Soldering', 'Ultrason Lehimlemen', 67, 1, 3),
(191, 'Wave Soldering', 'Dalgalı Lehimlemen', 67, 1, 3),
(192, 'Arc', 'Elektrikli Ark Kaynağı', 72, 1, 3),
(193, 'Dielectric', 'İçyükül Kaynağı', 72, 1, 3),
(194, 'Electromagnetic Welding', 'Elektromanyetik Kaynağı', 72, 1, 3),
(195, 'Electron Beam Welding', 'Elektron Demet Kaynağı', 72, 1, 3),
(196, 'Flow Welding', 'Akım Kaynağı', 72, 1, 3),
(197, 'Heated Metal Plate', 'Isınmış Metal Kaynağı', 72, 1, 3),
(198, 'High Frequency Resistance', 'Yüksek Sıklıklı Direnç Kaynağı', 72, 1, 3),
(199, 'Hot Air Welding', 'Sıcak Hava Kaynağı', 72, 1, 3),
(200, 'Induction', 'Endüksyon', 72, 1, 3),
(201, 'Infrared Welding', 'Kızılötesi Kaynağı', 72, 1, 3),
(202, 'Laser Welding', 'Lazer Kaynağı', 72, 1, 3),
(203, 'Magnetic Pulse Welding', 'Manyetik Darbeli Kaynak', 72, 1, 3),
(204, 'Oxyfeul Gas', 'Oxsijen Kaynağı', 72, 1, 3),
(205, 'Percussion (Manufacturing)', 'Elektrikli Çarpma Kaynağı', 72, 1, 3),
(206, 'Projection Welding', 'Projeksiyon Kaynağı', 72, 1, 3),
(207, 'Radio Frequency Welding', 'Yüksek Frekanslı Kaynak', 72, 1, 3),
(208, 'Resistance', 'Direnç Kaynağı', 72, 1, 3),
(209, 'Seam', 'Dikiş Kaynağı', 72, 1, 3),
(210, 'Solid State Welding', 'Katı Durum Kaynaklama', 72, 1, 3),
(211, 'Solvent', 'Eritici Madde Kaynağın', 72, 1, 3),
(212, 'Thermite', 'Termit Kaynağı', 72, 1, 3),
(213, 'Ultrasonic Welding', 'Ses Ötesi Kaynağı', 72, 1, 3),
(214, 'Upset Welding', 'Basınçlı Alın Kaynağı', 72, 1, 3),
(215, 'Blow Molding', 'Hava Basınçlı Kalıplama', 73, 1, 3),
(216, 'Compression Molding', 'Hava Basınçlı Kalıplama', 73, 1, 3),
(217, 'Dip Molding', 'Derin Kalıplaman', 73, 1, 3),
(218, 'Expanded Beam', 'Büyüyen Tespıh', 73, 1, 3),
(219, 'Extrusion', 'Çekme', 73, 1, 3),
(220, 'Foam', 'Köpükn', 73, 1, 3),
(221, 'Injection', 'Enjeksyon', 73, 1, 3),
(222, 'Laminating', 'Katmanlı Plastik Kalıplama', 73, 1, 3),
(223, 'Matched Mold', 'Eşleştirmeli Kalıp', 73, 1, 3),
(224, 'Pressure Plug Assist', 'Basınç Fişi Yardımlı Kalıplar', 73, 1, 3),
(225, 'Rotational Molding', 'Döner Kalıplama', 73, 1, 3),
(226, 'Thermoforming', 'Isıl Şekillendirme', 73, 1, 3),
(227, 'Transfer', 'Aktarmalı Kalıplama', 73, 1, 3),
(228, 'Vacuum Plug Assist', 'Vakum Fişi Destekli', 73, 1, 3),
(229, 'Edge Runner', 'Şili Değirmeni', 82, 1, 3),
(230, 'Gyratory Crusher', 'Döner (Eksantrik) Kırıcı', 82, 1, 3),
(231, 'Jaw Crusher', 'Çeneli Kırıcın', 82, 1, 3),
(232, 'Rollers', 'Silinder Kırıcın', 82, 1, 3),
(233, 'Blasting', 'Dinamitleme', 84, 1, 3),
(234, 'Quarrying', 'Taş Ocaklığı', 84, 1, 3),
(235, 'Joinery', 'Doğrama', 85, 1, 3),
(236, 'Drawing Bulging', 'şişirme', 119, 1, 4),
(237, 'Drawing Necking', 'Belverme', 119, 1, 4),
(238, 'Drawing Nosing', 'Burunlama', 119, 1, 4),
(239, 'Piercing', 'Delme-Pirsing', 122, 1, 4),
(240, 'Stamping', 'Damgalama-Pullama', 122, 1, 4),
(241, 'Shearing Coning', 'Konlama', 122, 1, 4),
(242, 'Cotter', 'Kama', 180, 1, 4),
(243, 'Groove', 'Pim Kanalın', 180, 1, 4),
(244, 'Quick Release', 'Hızlı Açılıp-Bağlanan', 180, 1, 4),
(245, 'Retaining Rings', 'Tespit Bileziği', 180, 1, 4),
(246, 'Roll', 'Yuvarlak Pim', 180, 1, 4),
(247, 'Tapered', 'Konik Pim', 180, 1, 4),
(248, 'Atomic Hydrogen', 'Aktif Hidrojen', 192, 1, 4),
(249, 'Carbon Arc', 'Karbon Ark', 192, 1, 4),
(250, 'Electroslag', 'Cüruf Altı Kaynaklaması', 192, 1, 4),
(251, 'Flux Cored', 'Eritken Cekirdekli Ark Kaynağı', 192, 1, 4),
(252, 'Gas Metal', 'Gazaltı Kaynağı', 192, 1, 4),
(253, 'Gas Tungesten', 'Gaz Örtülü Volfram Ark Kaynağı', 192, 1, 4),
(254, 'Impregnated Tape', 'Emdirilmiş Bant', 192, 1, 4),
(255, 'Manual Metal', 'Elle Metal Ark Kaynağı', 192, 1, 4),
(256, 'Plasma Arc', 'Plazma Ark', 192, 1, 4),
(257, 'Plasma MIG', 'Plazma MIG', 192, 1, 4),
(258, 'Regulated Metal Disposition', 'Ayarlı Metal Bırakma', 192, 1, 4),
(259, 'Shielded Metal', 'Korunmalı Me ark Kaynağı', 192, 1, 4),
(260, 'Stud', 'Saplama Kaynağı', 192, 1, 4),
(261, 'Submerged', 'Tozaltı Ark Kaynağı', 192, 1, 4),
(262, 'High Frequency', 'Yüksek Ferekanslı', 200, 1, 4),
(263, 'Low Frequency', 'Düşük Frekanslı', 200, 1, 4),
(264, 'Air Acetylene', 'Hava Asetilen Kaynağı', 204, 1, 4),
(265, 'Methylacetylene Propadiene', 'Metil Asetilen Propodien', 204, 1, 4),
(266, 'Oxy Acetylene', 'Oksi Asetilen', 204, 1, 4),
(267, 'Oxy Hydrogen', 'Oksi Hidrojen', 204, 1, 4),
(268, 'Pressure Gas', 'Basınçlı Gaz Kaynağı', 204, 1, 4),
(269, 'Bult Welding', 'Uç uça Kaynaklama', 208, 1, 4),
(270, 'Shot Welding', 'Vuruş Kaynağı', 208, 1, 4),
(271, 'Spot Welding', 'Nokta Kaynağı', 208, 1, 4),
(272, 'Cold Welding', 'Soğuk Kaynak', 210, 1, 4),
(273, 'Diffusion', 'Yayınımlı Kaynak', 210, 1, 4),
(274, 'Explosive', 'Patlamalı Kaynak', 210, 1, 4),
(275, 'Forge Welding', 'Dövmeli Kaynaklama', 210, 1, 4),
(276, 'Friction Welding', 'Sürtünmeli Kaynak', 210, 1, 4),
(277, 'Inertia', 'Friksiyon Kaynağı', 210, 1, 4),
(278, 'Roll Welding', 'Merdane Basınçlı Kaynak', 210, 1, 4),
(279, 'Biscuit', 'Peksimet', 235, 1, 4),
(280, 'Morticing', 'MorticingZıvana Açma', 235, 1, 4),
(281, 'Wood Working Lapping', 'Parlatman', 235, 1, 4),
(282, 'Piercing Dinking Operation', 'Süslü Kesme', 239, 1, 5),
(283, 'Piercing Lancing', 'Piercing Lancing', 239, 1, 5),
(284, 'Piercing  Nibbing', 'Piercing  Nibbling', 239, 1, 5),
(285, 'Piercing Notching', 'çentik açma', 239, 1, 5),
(286, 'Piercing Perforating', 'Pirsing Perforating', 239, 1, 5),
(287, 'Piercing  shaving', 'tıraşlama', 239, 1, 5),
(288, 'Pircing Trimming', 'çapak alma', 239, 1, 5),
(289, 'Shearing Piercing Cutoff', 'Shearing Piercing Cutoff', 239, 1, 5),
(290, 'Straight Shearing Slitting', 'Dogrudan Dilme', 239, 1, 5),
(291, 'Stamping Leather', 'Deri', 240, 1, 5),
(292, 'Stamping Metal', 'Metal', 240, 1, 5),
(293, 'Stamping Progressive', 'Kademeli Damgalama', 240, 1, 5),
(294, 'Electro Gas', 'Elektrikli Gaz Kaynağı', 252, 1, 5),
(295, 'Pulsed', 'Darbeli Gazaltı Kaynağı', 252, 1, 5),
(296, 'Short Circuit', 'Kısadevre Gazaltı Kaynağı', 252, 1, 5),
(297, 'Spray Transfer', 'Püskürtmeli Aktarım', 252, 1, 5),
(298, 'CO2', 'CO2', 268, 1, 5),
(299, 'Flash Butt Welding', 'Yakma Alın Kaynağı', 269, 1, 5),
(300, 'Hot Press', 'Sicak Pres Kaynağı', 273, 1, 5),
(301, 'Iso Static Hot Gas', 'Eşbasınçlı Sıcak Gaz Kaynağı', 273, 1, 5),
(302, 'Vaccum Furnace', 'Vakumlu Firin', 273, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table 't_prdct'
--

CREATE SEQUENCE t_prdct_seq;

CREATE TABLE IF NOT EXISTS t_prdct (
  id int NOT NULL DEFAULT NEXTVAL ('t_prdct_seq'),
  cmpny_id int DEFAULT NULL,
  name varchar(200) NOT NULL,
  PRIMARY KEY (id)
)    ;
 
ALTER SEQUENCE t_prdct_seq RESTART WITH 5;

CREATE INDEX cmpny_id ON t_prdct (cmpny_id);

--
-- Dumping data for table 't_prdct'
--

INSERT INTO t_prdct (id, cmpny_id, name) VALUES
(4, 7, 'Product A');

-- --------------------------------------------------------

--
-- Table structure for table 't_prj'
--

CREATE SEQUENCE t_prj_seq;

CREATE TABLE IF NOT EXISTS t_prj (
  id int NOT NULL DEFAULT NEXTVAL ('t_prj_seq'),
  name varchar(255) NOT NULL,
  start_date date NOT NULL,
  end_date date DEFAULT NULL,
  status_id int NOT NULL,
  description varchar(200) DEFAULT NULL,
  active smallint NOT NULL,
  PRIMARY KEY (id)
)    ;
 
ALTER SEQUENCE t_prj_seq RESTART WITH 6;

CREATE INDEX status_id ON t_prj (status_id);

--
-- Dumping data for table 't_prj'
--

INSERT INTO t_prj (id, name, start_date, end_date, status_id, description, active) VALUES
(2, 'Project X', '2014-06-10', NULL, 3, 'The X-Men are a team of mutant superheroes in the Marvel Universe. They were created by writer Stan Lee and artist Jack Kirby, and first appeared in The X-Men #1 (September 1963). The basic concept of', 1),
(3, 'Odessa Mobile  Technology Project', '2014-06-05', NULL, 1, 'This section should describe the work you have done to date, the choices you had with regard to hardware/software, and an explanation of how you arrived at the decision to use L3 and Tiburon.', 1),
(4, 'Proje Y', '2014-06-10', NULL, 2, 'Project', 1),
(5, 'Project C', '2014-09-09', NULL, 2, 'desc', 1);

-- --------------------------------------------------------

--
-- Table structure for table 't_prj_acss_cmpny'
--

CREATE TABLE IF NOT EXISTS t_prj_acss_cmpny (
  cmpny_id int NOT NULL,
  prj_id int NOT NULL,
  read_acss smallint DEFAULT NULL,
  write_acss smallint DEFAULT NULL,
  delete_acss smallint DEFAULT NULL,
  PRIMARY KEY (cmpny_id,prj_id)
) ;

CREATE INDEX cmpny_id ON t_prj_acss_cmpny (cmpny_id);
CREATE INDEX prj_id ON t_prj_acss_cmpny (prj_id);

-- --------------------------------------------------------

--
-- Table structure for table 't_prj_acss_user'
--

CREATE TABLE IF NOT EXISTS t_prj_acss_user (
  user_id int NOT NULL,
  prj_id int NOT NULL,
  read_acss smallint DEFAULT NULL,
  write_acss smallint DEFAULT NULL,
  delete_acss smallint DEFAULT NULL,
  PRIMARY KEY (user_id,prj_id)
) ;

CREATE INDEX prj_id ON t_prj_acss_user (prj_id);
CREATE INDEX user_id ON t_prj_acss_user (user_id);

-- --------------------------------------------------------

--
-- Table structure for table 't_prj_cmpny'
--

CREATE TABLE IF NOT EXISTS t_prj_cmpny (
  prj_id int NOT NULL,
  cmpny_id int NOT NULL,
  PRIMARY KEY (prj_id,cmpny_id)
) ;

CREATE INDEX cmpny_id ON t_prj_cmpny (cmpny_id);
CREATE INDEX prj_id ON t_prj_cmpny (prj_id);

--
-- Dumping data for table 't_prj_cmpny'
--

INSERT INTO t_prj_cmpny (prj_id, cmpny_id) VALUES
(2, 7),
(3, 7),
(4, 7),
(5, 7),
(2, 8),
(4, 8);

-- --------------------------------------------------------

--
-- Table structure for table 't_prj_cnsltnt'
--

CREATE TABLE IF NOT EXISTS t_prj_cnsltnt (
  prj_id int NOT NULL,
  cnsltnt_id int NOT NULL,
  active smallint DEFAULT NULL,
  PRIMARY KEY (prj_id,cnsltnt_id)
) ;

CREATE INDEX cnsltnt_id ON t_prj_cnsltnt (cnsltnt_id);
CREATE INDEX prj_id ON t_prj_cnsltnt (prj_id);

--
-- Dumping data for table 't_prj_cnsltnt'
--

INSERT INTO t_prj_cnsltnt (prj_id, cnsltnt_id, active) VALUES
(2, 1, 1),
(2, 2, 1),
(2, 3, 1),
(3, 2, 1),
(4, 3, 1),
(5, 2, 1),
(5, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table 't_prj_cntct_prsnl'
--

CREATE TABLE IF NOT EXISTS t_prj_cntct_prsnl (
  prj_id int NOT NULL,
  usr_id int NOT NULL,
  description varchar(200) DEFAULT NULL,
  PRIMARY KEY (prj_id,usr_id)
) ;

CREATE INDEX usr_id ON t_prj_cntct_prsnl (usr_id);

--
-- Dumping data for table 't_prj_cntct_prsnl'
--

INSERT INTO t_prj_cntct_prsnl (prj_id, usr_id, description) VALUES
(2, 2, NULL),
(3, 3, NULL),
(4, 2, NULL),
(5, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table 't_prj_doc'
--

CREATE TABLE IF NOT EXISTS t_prj_doc (
  doc_id int NOT NULL,
  prj_id int NOT NULL,
  PRIMARY KEY (doc_id,prj_id)
) ;

CREATE INDEX doc_id ON t_prj_doc (doc_id);
CREATE INDEX prj_id ON t_prj_doc (prj_id);

-- --------------------------------------------------------

--
-- Table structure for table 't_prj_status'
--

CREATE SEQUENCE t_prj_status_seq;

CREATE TABLE IF NOT EXISTS t_prj_status (
  id int NOT NULL DEFAULT NEXTVAL ('t_prj_status_seq'),
  name varchar(200) DEFAULT NULL,
  name_tr varchar(200) DEFAULT NULL,
  active smallint NOT NULL,
  short_code varchar(3) DEFAULT NULL,
  PRIMARY KEY (id)
)    ;
 
ALTER SEQUENCE t_prj_status_seq RESTART WITH 6;

--
-- Dumping data for table 't_prj_status'
--

INSERT INTO t_prj_status (id, name, name_tr, active, short_code) VALUES
(1, 'Envisioning', NULL, 1, 'env'),
(2, 'Planing', NULL, 1, 'pln'),
(3, 'Development', NULL, 1, 'dev'),
(4, 'Stabilization', NULL, 1, 'sta'),
(5, 'Deployment', NULL, 1, 'dep');

-- --------------------------------------------------------

--
-- Table structure for table 't_role'
--

CREATE SEQUENCE t_role_seq;

CREATE TABLE IF NOT EXISTS t_role (
  id int NOT NULL DEFAULT NEXTVAL ('t_role_seq'),
  name varchar(100) NOT NULL,
  name_tr varchar(100) DEFAULT NULL,
  active smallint NOT NULL,
  short_code varchar(3) DEFAULT NULL,
  PRIMARY KEY (id)
)    ;
 
ALTER SEQUENCE t_role_seq RESTART WITH 4;

--
-- Dumping data for table 't_role'
--

INSERT INTO t_role (id, name, name_tr, active, short_code) VALUES
(1, 'Consultant', 'Consultant', 1, 'CNS'),
(2, 'Visitor', 'Visitor', 1, 'VST'),
(3, 'Admin', 'Admin', 1, 'ADM');

-- --------------------------------------------------------

--
-- Table structure for table 't_unit'
--

CREATE SEQUENCE t_unit_seq;

CREATE TABLE IF NOT EXISTS t_unit (
  id int NOT NULL DEFAULT NEXTVAL ('t_unit_seq'),
  name varchar(200) NOT NULL,
  name_tr varchar(200) DEFAULT NULL,
  active smallint NOT NULL,
  PRIMARY KEY (id)
)    ;
 
ALTER SEQUENCE t_unit_seq RESTART WITH 37;

--
-- Dumping data for table 't_unit'
--

INSERT INTO t_unit (id, name, name_tr, active) VALUES
(1, '', NULL, 0),
(2, '%', NULL, 1),
(3, '1/seconed', NULL, 1),
(4, 'Amper', NULL, 1),
(5, 'bar', NULL, 1),
(6, 'degree', NULL, 1),
(7, 'dk', NULL, 1),
(8, 'gram', NULL, 1),
(9, 'kg', NULL, 1),
(10, 'KW', NULL, 1),
(11, 'Liter', NULL, 1),
(12, 'M', NULL, 1),
(13, 'm/dk', NULL, 1),
(14, 'm/min', NULL, 1),
(15, 'm/s', NULL, 1),
(16, 'm³/min', NULL, 1),
(17, 'micrometer', NULL, 1),
(18, 'mm', NULL, 1),
(19, 'm²', NULL, 1),
(20, 'm³', NULL, 1),
(21, 'mm/s', NULL, 1),
(22, 'N*m', NULL, 1),
(23, 'Newton', NULL, 1),
(24, 'Nm', NULL, 1),
(25, 'number/pocket', NULL, 1),
(26, 'Pa', NULL, 1),
(27, 'Pa/min', NULL, 1),
(28, 'pocket', NULL, 1),
(29, 'quantity', NULL, 1),
(30, 'rpm', NULL, 1),
(31, 'steps', NULL, 1),
(32, 'unit', NULL, 1),
(33, 'unit/min', NULL, 1),
(34, 'volt', NULL, 1),
(35, 'volt,Watt', NULL, 1),
(36, 'year', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table 't_user'
--

CREATE SEQUENCE t_user_seq;

CREATE TABLE IF NOT EXISTS t_user (
  id int NOT NULL DEFAULT NEXTVAL ('t_user_seq'),
  name varchar(100) NOT NULL,
  surname varchar(100) NOT NULL,
  user_name varchar(50) NOT NULL,
  psswrd varchar(40) NOT NULL,
  role_id int DEFAULT '2',
  title varchar(255) DEFAULT NULL,
  phone_num_1 varchar(50) DEFAULT NULL,
  phone_num_2 varchar(50) DEFAULT NULL,
  fax_num varchar(50) DEFAULT NULL,
  email varchar(150) DEFAULT NULL,
  description varchar(200) DEFAULT NULL,
  linkedin_user smallint DEFAULT NULL,
  photo varchar(60) DEFAULT NULL,
  active smallint NOT NULL,
  random_string varchar(20) NOT NULL,
  click_control int NOT NULL,
  PRIMARY KEY (id)
)    ;
 
ALTER SEQUENCE t_user_seq RESTART WITH 7;

CREATE INDEX role_id ON t_user (role_id);

--
-- Dumping data for table 't_user'
--

INSERT INTO t_user (id, name, surname, user_name, psswrd, role_id, title, phone_num_1, phone_num_2, fax_num, email, description, linkedin_user, photo, active, random_string, click_control) VALUES
(1, 'User', 'surname', 'example', '8287458823facb8ff918dbfabcd22ccb', 1, 'Engineer', '1-800-694-7466', '1-800-694-7466', '1-800-694-7466', 'example@gmail.com', 'Engineer at lead era ecoman project', NULL, '1.jpg', 0, '', 0),
(2, 'User', 'surname2', 'example1', '39109a5bb10ccb7aff1313d369804b74', 1, 'Manager', '1-800-694-7466', '1-800-694-7466', '1-800-694-7466', 'example2@gmail.com', 'desc', NULL, '2.jpg', 0, '', 0),
(3, 'User', 'surname3', 'example2', '31663bdaeeefb7ae67859c6413d58b39', 1, 'job title', '1-800-694-7466', '1-800-694-7466', '1-800-694-7466', 'example3@gmail.com', 'description', NULL, '3.jpg', 0, '', 0),
(6, 'User', 'surname4', 'example3', '8287458823facb8ff918dbfabcd22ccb', 2, 'manager', '1-800-694-7466', '1-800-694-7466', '1-800-694-7466', 'example4@gmail.com', 'desc', NULL, '6.jpg', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table 't_user_log'
--

CREATE SEQUENCE t_user_log_seq;

CREATE TABLE IF NOT EXISTS t_user_log (
  id int NOT NULL DEFAULT NEXTVAL ('t_user_log_seq'),
  user_id int DEFAULT NULL,
  PRIMARY KEY (id)
)   ;
 
ALTER SEQUENCE t_user_log_seq RESTART WITH 1;

CREATE INDEX user_id ON t_user_log (user_id);

--
-- Constraints for dumped tables
--

--
-- Constraints for table 't_clstr'
--
ALTER TABLE t_clstr
  ADD CONSTRAINT FK_T_CLSTR_T_ORG_IND_REG FOREIGN KEY (org_ind_reg_id) REFERENCES t_org_ind_reg (id);

--
-- Constraints for table 't_cmpny_clstr'
--
ALTER TABLE t_cmpny_clstr
  ADD CONSTRAINT FK_T_CMPNY_CLSTR_T_CLSTR FOREIGN KEY (clstr_id) REFERENCES t_clstr (id),
  ADD CONSTRAINT FK_T_CMPNY_CLSTR_T_CMPNY FOREIGN KEY (cmpny_id) REFERENCES 't_cmpny' (id);

--
-- Constraints for table 't_cmpny_data'
--
ALTER TABLE t_cmpny_data
  ADD CONSTRAINT FK_T_CMPNY_PRJ_T_CMPNY FOREIGN KEY (cmpny_id) REFERENCES t_cmpny (id);

--
-- Constraints for table 't_cmpny_eqpmnt'
--
ALTER TABLE t_cmpny_eqpmnt
  ADD CONSTRAINT T_CMPNY_EQPMNT_ibfk_1 FOREIGN KEY (cmpny_id) REFERENCES t_cmpny (id),
  ADD CONSTRAINT T_CMPNY_EQPMNT_ibfk_2 FOREIGN KEY (eqpmnt_id) REFERENCES 't_eqpmnt' (id),
  ADD CONSTRAINT T_CMPNY_EQPMNT_ibfk_3 FOREIGN KEY (eqpmnt_type_id) REFERENCES 't_eqpmnt_type' (id),
  ADD CONSTRAINT T_CMPNY_EQPMNT_ibfk_4 FOREIGN KEY (eqpmnt_type_attrbt_id) REFERENCES 't_eqpmnt_type_attrbt' (id);

--
-- Constraints for table 't_cmpny_flow'
--
ALTER TABLE t_cmpny_flow
  ADD CONSTRAINT FK_T_FLOW_T_CMPNY_DATA FOREIGN KEY (cmpny_id) REFERENCES t_cmpny_data (cmpny_id),
  ADD CONSTRAINT FK_T_FLOW_T_FLOW_NAME FOREIGN KEY (flow_id) REFERENCES 't_flow' (id),
  ADD CONSTRAINT FK_T_FLOW_T_FLOW_TYPE FOREIGN KEY (flow_type_id) REFERENCES 't_flow_type' (id),
  ADD CONSTRAINT FK_T_FLOW_T_UNIT_COST FOREIGN KEY (cost_unit_id) REFERENCES 't_unit' (id),
  ADD CONSTRAINT FK_T_FLOW_T_UNIT_EP FOREIGN KEY (ep_unit_id) REFERENCES 't_unit' (id),
  ADD CONSTRAINT FK_T_FLOW_T_UNIT_QNTTY FOREIGN KEY (qntty_unit_id) REFERENCES 't_unit' (id);

--
-- Constraints for table 't_cmpny_flow_cmpnnt'
--
ALTER TABLE t_cmpny_flow_cmpnnt
  ADD CONSTRAINT FK_T_FLOW_CMPNNT_NAME_T_CMPNNT_NAME FOREIGN KEY (cmpnnt_id) REFERENCES t_cmpnnt (id),
  ADD CONSTRAINT FK_T_FLOW_CMPNNT_T_FLOW FOREIGN KEY (cmpny_flow_id) REFERENCES 't_cmpny_flow' (id);

--
-- Constraints for table 't_cmpny_flow_prcss'
--
ALTER TABLE t_cmpny_flow_prcss
  ADD CONSTRAINT FK_T_FLOW_PRCSS_T_FLOW FOREIGN KEY (cmpny_flow_id) REFERENCES t_cmpny_flow (id),
  ADD CONSTRAINT FK_T_FLOW_PRCSS_T_PRCSS FOREIGN KEY (cmpny_prcss_id) REFERENCES 't_cmpny_prcss' (id);

--
-- Constraints for table 't_cmpny_nace_code'
--
ALTER TABLE t_cmpny_nace_code
  ADD CONSTRAINT FK_T_CMPNY_NACE_CODE_T_CMPNY FOREIGN KEY (cmpny_id) REFERENCES t_cmpny (id),
  ADD CONSTRAINT FK_T_CMPNY_NACE_CODE_T_NACE_CODE FOREIGN KEY (nace_code_id) REFERENCES 't_nace_code' (id);

--
-- Constraints for table 't_cmpny_org_ind_reg'
--
ALTER TABLE t_cmpny_org_ind_reg
  ADD CONSTRAINT FK_T_CMPNY_ORG_IND_REG_T_CMPNY FOREIGN KEY (cmpny_id) REFERENCES t_cmpny (id),
  ADD CONSTRAINT FK_T_CMPNY_ORG_IND_REG_T_ORG_IND_REG FOREIGN KEY (org_ind_reg_id) REFERENCES 't_org_ind_reg' (id);

--
-- Constraints for table 't_cmpny_prcss'
--
ALTER TABLE t_cmpny_prcss
  ADD CONSTRAINT FK_T_PRCSS_T_CMPNY_DATA FOREIGN KEY (cmpny_id) REFERENCES t_cmpny_data (cmpny_id),
  ADD CONSTRAINT FK_T_PRCSS_T_PRCSS_NAME FOREIGN KEY (prcss_id) REFERENCES 't_prcss' (id);

--
-- Constraints for table 't_cmpny_prcss_eqpmnt_type'
--
ALTER TABLE t_cmpny_prcss_eqpmnt_type
  ADD CONSTRAINT FK_T_CMPNY_PRCSS_EQPMNT_TYPE_T_CMPNY_EQPMNT_TYPE FOREIGN KEY (cmpny_eqpmnt_type_id) REFERENCES t_cmpny_eqpmnt (id),
  ADD CONSTRAINT FK_T_CMPNY_PRCSS_EQPMNT_TYPE_T_CMPNY_PRCSS FOREIGN KEY (cmpny_prcss_id) REFERENCES 't_cmpny_prcss' (id);

--
-- Constraints for table 't_cmpny_prsnl'
--
ALTER TABLE t_cmpny_prsnl
  ADD CONSTRAINT FK_T_CMPNY_PRSNL_T_CMPNY FOREIGN KEY (cmpny_id) REFERENCES t_cmpny (id),
  ADD CONSTRAINT FK_T_CMPNY_PRSNL_T_USER FOREIGN KEY (user_id) REFERENCES 't_user' (id);

--
-- Constraints for table 't_cnsltnt'
--
ALTER TABLE t_cnsltnt
  ADD CONSTRAINT FK_T_CNSLTNT_T_USER FOREIGN KEY (user_id) REFERENCES t_user (id);

--
-- Constraints for table 't_cp_allocation'
--
ALTER TABLE t_cp_allocation
  ADD CONSTRAINT t_cp_allocation_ibfk_1 FOREIGN KEY (prcss_id) REFERENCES t_cmpny_prcss (id),
  ADD CONSTRAINT t_cp_allocation_ibfk_2 FOREIGN KEY (flow_id) REFERENCES 't_flow' (id),
  ADD CONSTRAINT t_cp_allocation_ibfk_3 FOREIGN KEY (flow_type_id) REFERENCES 't_flow_type' (id);

--
-- Constraints for table 't_cp_is_candidate'
--
ALTER TABLE t_cp_is_candidate
  ADD CONSTRAINT t_cp_is_candidate_ibfk_1 FOREIGN KEY (allocation_id) REFERENCES t_cp_allocation (id);

--
-- Constraints for table 't_cp_scoping_files'
--
ALTER TABLE t_cp_scoping_files
  ADD CONSTRAINT t_cp_scoping_files_ibfk_1 FOREIGN KEY (prjct_id) REFERENCES t_prj (id),
  ADD CONSTRAINT t_cp_scoping_files_ibfk_2 FOREIGN KEY (cmpny_id) REFERENCES 't_cmpny' (id);

--
-- Constraints for table 't_eqpmnt_type_attrbt'
--
ALTER TABLE t_eqpmnt_type_attrbt
  ADD CONSTRAINT FK_T_EQPMNT_ATTRBT_T_EQPMNT_TYPE FOREIGN KEY (eqpmnt_type_id) REFERENCES t_eqpmnt_type (id);

--
-- Constraints for table 't_prcss'
--
ALTER TABLE t_prcss
  ADD CONSTRAINT FK_T_PRCSS_NAME_T_PRCSS_NAME FOREIGN KEY (mother_id) REFERENCES t_prcss (id);

--
-- Constraints for table 't_prdct'
--
ALTER TABLE t_prdct
  ADD CONSTRAINT FK_T_PRDCT_T_CMPNY_DATA FOREIGN KEY (cmpny_id) REFERENCES t_cmpny_data (cmpny_id);

--
-- Constraints for table 't_prj'
--
ALTER TABLE t_prj
  ADD CONSTRAINT FK_T_PRJ_T_STATUS FOREIGN KEY (status_id) REFERENCES t_prj_status (id);

--
-- Constraints for table 't_prj_acss_cmpny'
--
ALTER TABLE t_prj_acss_cmpny
  ADD CONSTRAINT FK_T_PRJ_ACSS_CMPNY_T_CMPNY FOREIGN KEY (cmpny_id) REFERENCES t_cmpny (id),
  ADD CONSTRAINT FK_T_PRJ_ACSS_CMPNY_T_PRJ FOREIGN KEY (prj_id) REFERENCES 't_prj' (id);

--
-- Constraints for table 't_prj_acss_user'
--
ALTER TABLE t_prj_acss_user
  ADD CONSTRAINT FK_T_PRJ_ACSS_USER_T_PRJ FOREIGN KEY (prj_id) REFERENCES t_prj (id),
  ADD CONSTRAINT FK_T_PRJ_ACSS_USER_T_USER FOREIGN KEY (user_id) REFERENCES 't_user' (id);

--
-- Constraints for table 't_prj_cmpny'
--
ALTER TABLE t_prj_cmpny
  ADD CONSTRAINT FK_T_PRJ_CMPNY_T_CMPNY FOREIGN KEY (cmpny_id) REFERENCES t_cmpny (id),
  ADD CONSTRAINT FK_T_PRJ_CMPNY_T_PRJ FOREIGN KEY (prj_id) REFERENCES 't_prj' (id);

--
-- Constraints for table 't_prj_cnsltnt'
--
ALTER TABLE t_prj_cnsltnt
  ADD CONSTRAINT FK_T_PRJ_CNSLTNT_T_CNSLTNT FOREIGN KEY (cnsltnt_id) REFERENCES t_cnsltnt (user_id),
  ADD CONSTRAINT FK_T_PRJ_CNSLTNT_T_PRJ FOREIGN KEY (prj_id) REFERENCES 't_prj' (id);

--
-- Constraints for table 't_prj_cntct_prsnl'
--
ALTER TABLE t_prj_cntct_prsnl
  ADD CONSTRAINT FK_T_PRJ_CNTCT_PRSNL_T_USER FOREIGN KEY (usr_id) REFERENCES t_user (id);

--
-- Constraints for table 't_prj_doc'
--
ALTER TABLE t_prj_doc
  ADD CONSTRAINT FK_T_PRJ_DOC_T_DOC FOREIGN KEY (doc_id) REFERENCES t_doc (id),
  ADD CONSTRAINT FK_T_PRJ_DOC_T_PRJ FOREIGN KEY (prj_id) REFERENCES 't_prj' (id);

--
-- Constraints for table 't_user'
--
ALTER TABLE t_user
  ADD CONSTRAINT FK_T_USER_T_ROLE FOREIGN KEY (role_id) REFERENCES t_role (id);

--
-- Constraints for table 't_user_log'
--
ALTER TABLE t_user_log
  ADD CONSTRAINT FK_T_USER_LOG_T_USER FOREIGN KEY (user_id) REFERENCES t_user (id);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
