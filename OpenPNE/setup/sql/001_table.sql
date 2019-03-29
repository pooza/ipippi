SET NAMES ujis;

--
-- Table structure for table `c_access_block`
--

CREATE TABLE c_access_block (
  c_access_block_id int(11) NOT NULL auto_increment,
  c_member_id int(11) NOT NULL default '0',
  c_member_id_block int(11) NOT NULL default '0',
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (c_access_block_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_access_log`
--

CREATE TABLE c_access_log (
  c_access_log_id int(11) NOT NULL auto_increment,
  c_member_id int(11) NOT NULL default '0',
  page_name varchar(100) NOT NULL default '',
  target_c_member_id int(11) default '0',
  target_c_commu_id int(11) default '0',
  target_c_commu_topic_id int(11) default '0',
  target_c_diary_id int(11) default '0',
  ktai_flag int(11) NOT NULL default '0',
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (c_access_log_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_admin_config`
--

CREATE TABLE c_admin_config (
  c_admin_config_id int(11) NOT NULL auto_increment,
  name varchar(64) NOT NULL default '',
  value text NOT NULL,
  PRIMARY KEY  (c_admin_config_id),
  KEY name (name)
) TYPE=MyISAM;

--
-- Table structure for table `c_admin_user`
--

CREATE TABLE c_admin_user (
  c_admin_user_id int(11) NOT NULL auto_increment,
  username text NOT NULL,
  password text NOT NULL,
  PRIMARY KEY  (c_admin_user_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_ashiato`
--

CREATE TABLE c_ashiato (
  c_ashiato_id int(11) NOT NULL auto_increment,
  c_member_id_from int(11) NOT NULL default '0',
  c_member_id_to int(11) NOT NULL default '0',
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  r_date date NOT NULL default '0000-00-00',
  PRIMARY KEY  (c_ashiato_id),
  KEY c_member_id_from (c_member_id_from),
  KEY c_member_id_to (c_member_id_to)
) TYPE=MyISAM;

--
-- Table structure for table `c_banner`
--

CREATE TABLE c_banner (
  c_banner_id int(11) NOT NULL auto_increment,
  image_filename text NOT NULL,
  a_href text NOT NULL,
  type enum('TOP','SIDE') NOT NULL default 'TOP',
  nickname text NOT NULL,
  is_hidden tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (c_banner_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_banner_log`
--

CREATE TABLE c_banner_log (
  c_banner_log_id int(11) NOT NULL auto_increment,
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  r_date date NOT NULL default '0000-00-00',
  c_banner_id int(11) NOT NULL default '0',
  c_member_id int(11) NOT NULL default '0',
  clicked_from text NOT NULL,
  PRIMARY KEY  (c_banner_log_id),
  KEY c_banner_id (c_banner_id),
  KEY c_member_id (c_member_id)
) TYPE=MyISAM PACK_KEYS=0;

--
-- Table structure for table `c_bookmark`
--

CREATE TABLE c_bookmark (
  c_bookmark_id int(11) NOT NULL auto_increment,
  c_member_id_from int(11) NOT NULL default '0',
  c_member_id_to int(11) NOT NULL default '0',
  r_datetime varchar(100) NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (c_bookmark_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_commu`
--

CREATE TABLE c_commu (
  c_commu_id int(11) NOT NULL auto_increment,
  name text NOT NULL,
  c_member_id_admin int(11) NOT NULL default '0',
  info text NOT NULL,
  c_commu_category_id int(11) NOT NULL default '0',
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  r_date date NOT NULL default '0000-00-00',
  access_date datetime NOT NULL default '0000-00-00 00:00:00',
  search_word text NOT NULL,
  image_filename text NOT NULL,
  public_flag enum('public','auth_public','auth_sns','auth_commu_member') NOT NULL default 'public',
  is_send_join_mail tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (c_commu_id),
  KEY c_commu_category_id (c_commu_category_id),
  KEY c_member_id_admin (c_member_id_admin),
  KEY name (name(10)),
  FULLTEXT KEY search_word (search_word)
) TYPE=MyISAM;

--
-- Table structure for table `c_commu_admin_confirm`
--

CREATE TABLE c_commu_admin_confirm (
  c_commu_admin_confirm_id int(11) NOT NULL auto_increment,
  c_commu_id int(11) NOT NULL default '0',
  c_member_id_to int(11) NOT NULL default '0',
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  message text NOT NULL,
  PRIMARY KEY  (c_commu_admin_confirm_id),
  KEY c_member_id_to (c_member_id_to),
  KEY c_commu_id (c_commu_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_commu_category`
--

CREATE TABLE c_commu_category (
  c_commu_category_id int(11) NOT NULL auto_increment,
  name text NOT NULL,
  sort_order int(11) NOT NULL default '0',
  c_commu_category_parent_id int(11) NOT NULL default '0',
  PRIMARY KEY  (c_commu_category_id),
  KEY c_commu_category_parent_id (c_commu_category_parent_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_commu_category_parent`
--

CREATE TABLE c_commu_category_parent (
  c_commu_category_parent_id int(11) NOT NULL auto_increment,
  name text NOT NULL,
  sort_order int(11) NOT NULL default '0',
  is_official tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (c_commu_category_parent_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_commu_member`
--

CREATE TABLE c_commu_member (
  c_commu_member_id int(11) NOT NULL auto_increment,
  c_member_id int(11) NOT NULL default '0',
  c_commu_id int(11) NOT NULL default '0',
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  is_receive_mail tinyint(1) NOT NULL default '0',
  is_receive_mail_pc int(11) NOT NULL default '0',
  PRIMARY KEY  (c_commu_member_id),
  KEY c_commu_id (c_commu_id),
  KEY c_member_id (c_member_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_commu_member_confirm`
--

CREATE TABLE c_commu_member_confirm (
  c_commu_member_confirm_id int(11) NOT NULL auto_increment,
  c_commu_id int(11) NOT NULL default '0',
  c_member_id int(11) NOT NULL default '0',
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  is_receive_mail tinyint(1) NOT NULL default '0',
  message text NOT NULL,
  PRIMARY KEY  (c_commu_member_confirm_id),
  KEY c_member_id (c_member_id),
  KEY c_commu_id (c_commu_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_commu_review`
--

CREATE TABLE c_commu_review (
  c_commu_review_id int(11) NOT NULL auto_increment,
  c_commu_id int(11) NOT NULL default '0',
  c_review_id int(11) NOT NULL default '0',
  c_member_id int(11) NOT NULL default '0',
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (c_commu_review_id),
  KEY c_commu_id (c_commu_id,c_review_id,c_member_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_commu_topic`
--

CREATE TABLE c_commu_topic (
  c_commu_topic_id int(11) NOT NULL auto_increment,
  c_commu_id int(11) NOT NULL default '0',
  name text NOT NULL,
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  r_date date NOT NULL default '0000-00-00',
  access_date datetime NOT NULL default '0000-00-00 00:00:00',
  c_member_id int(11) NOT NULL default '0',
  open_date date NOT NULL default '0000-00-00',
  open_date_comment varchar(100) NOT NULL default '',
  open_pref_id int(11) NOT NULL default '0',
  open_pref_comment varchar(100) NOT NULL default '',
  invite_period date NOT NULL default '0000-00-00',
  event_flag int(11) NOT NULL default '0',
  PRIMARY KEY  (c_commu_topic_id),
  KEY c_member_id (c_member_id),
  KEY c_commu_id (c_commu_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_commu_topic_comment`
--

CREATE TABLE c_commu_topic_comment (
  c_commu_topic_comment_id int(11) NOT NULL auto_increment,
  c_commu_id int(11) NOT NULL default '0',
  c_member_id int(11) NOT NULL default '0',
  body text NOT NULL,
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  r_date date NOT NULL default '0000-00-00',
  number int(11) NOT NULL default '0',
  c_commu_topic_id int(11) NOT NULL default '0',
  is_checked tinyint(1) NOT NULL default '0',
  image_filename1 varchar(200) NOT NULL default '',
  image_filename2 varchar(200) NOT NULL default '',
  image_filename3 varchar(200) NOT NULL default '',
  event_flag varchar(200) NOT NULL default '',
  delete_reason enum('BY_USER','BY_ADMIN') default NULL,
  PRIMARY KEY  (c_commu_topic_comment_id),
  KEY c_commu_topic_id (c_commu_topic_id),
  KEY c_commu_id (c_commu_id),
  KEY c_member_id (c_member_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_diary`
--

CREATE TABLE c_diary (
  c_diary_id int(11) NOT NULL auto_increment,
  c_member_id int(11) NOT NULL default '0',
  subject text NOT NULL,
  body text NOT NULL,
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  r_date date NOT NULL default '0000-00-00',
  image_filename_1 text NOT NULL,
  image_filename_2 text NOT NULL,
  image_filename_3 text NOT NULL,
  is_checked tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (c_diary_id),
  KEY c_member_id (c_member_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_diary_comment`
--

CREATE TABLE c_diary_comment (
  c_diary_comment_id int(11) NOT NULL auto_increment,
  c_diary_id int(11) NOT NULL default '0',
  c_member_id int(11) NOT NULL default '0',
  body text NOT NULL,
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  is_checked tinyint(1) NOT NULL default '0',
  delete_reason enum('BY_USER','BY_ADMIN') default NULL,
  PRIMARY KEY  (c_diary_comment_id),
  KEY c_member_id (c_member_id),
  KEY c_diary_id (c_diary_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_event_member`
--

CREATE TABLE c_event_member (
  c_event_member_id int(11) NOT NULL auto_increment,
  c_commu_topic_id int(11) NOT NULL default '0',
  c_member_id int(11) NOT NULL default '0',
  is_admin tinyint(4) NOT NULL default '0',
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (c_event_member_id),
  KEY c_commu_topic_id (c_commu_topic_id),
  KEY c_member_id (c_member_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_friend`
--

CREATE TABLE c_friend (
  c_friend_id int(11) NOT NULL auto_increment,
  c_member_id_from int(11) NOT NULL default '0',
  c_member_id_to int(11) NOT NULL default '0',
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  intro text NOT NULL,
  r_datetime_intro datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (c_friend_id),
  KEY c_member_id_to (c_member_id_to),
  KEY c_member_id_from (c_member_id_from)
) TYPE=MyISAM;

--
-- Table structure for table `c_friend_confirm`
--

CREATE TABLE c_friend_confirm (
  c_friend_confirm_id int(11) NOT NULL auto_increment,
  c_member_id_from int(11) NOT NULL default '0',
  c_member_id_to int(11) NOT NULL default '0',
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  message text NOT NULL,
  PRIMARY KEY  (c_friend_confirm_id),
  KEY c_member_id_to (c_member_id_to),
  KEY c_member_id_from (c_member_id_from)
) TYPE=MyISAM PACK_KEYS=0;

--
-- Table structure for table `c_image`
--

CREATE TABLE c_image (
  c_image_id int(11) NOT NULL auto_increment,
  filename text NOT NULL,
  bin longblob NOT NULL,
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  type text,
  PRIMARY KEY  (c_image_id),
  KEY filename (filename(100))
) TYPE=MyISAM;

--
-- Table structure for table `c_invite`
--

CREATE TABLE c_invite (
  c_invite_id int(11) NOT NULL auto_increment,
  session varchar(32) NOT NULL default '',
  mail_address text NOT NULL,
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  c_member_id_invite int(11) NOT NULL default '0',
  PRIMARY KEY  (c_invite_id),
  UNIQUE KEY session (session)
) TYPE=MyISAM;

--
-- Table structure for table `c_ktai_address_pre`
--

CREATE TABLE c_ktai_address_pre (
  c_ktai_address_pre_id int(11) NOT NULL auto_increment,
  c_member_id int(11) NOT NULL default '0',
  session varchar(32) NOT NULL default '',
  ktai_address varchar(64) NOT NULL default '',
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (c_ktai_address_pre_id),
  UNIQUE KEY session (session)
) TYPE=MyISAM;

--
-- Table structure for table `c_member`
--

CREATE TABLE c_member (
  c_member_id int(11) NOT NULL auto_increment,
  nickname text NOT NULL,
  birth_year smallint(4) NOT NULL default '0',
  birth_month tinyint(2) NOT NULL default '0',
  birth_day tinyint(2) NOT NULL default '0',
  public_flag_birth_year enum('public','friend','private') NOT NULL default 'public',
  image_filename text NOT NULL,
  image_filename_1 text NOT NULL,
  image_filename_2 text NOT NULL,
  image_filename_3 text NOT NULL,
  access_date datetime NOT NULL default '0000-00-00 00:00:00',
  r_date datetime NOT NULL default '0000-00-00 00:00:00',
  rss text NOT NULL,
  rss_root text NOT NULL,
  ashiato_mail_num int(11) NOT NULL default '0',
  is_receive_mail tinyint(1) NOT NULL default '0',
  is_receive_daily_news tinyint(1) NOT NULL default '0',
  is_receive_ktai_mail tinyint(1) NOT NULL default '0',
  c_member_id_invite int(11) NOT NULL default '0',
  c_password_query_id int(11) NOT NULL default '0',
  public_flag_diary enum('public','friend') NOT NULL default 'public',
  PRIMARY KEY  (c_member_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_member_ktai_pre`
--

CREATE TABLE c_member_ktai_pre (
  c_member_ktai_pre_id int(11) NOT NULL auto_increment,
  session varchar(32) NOT NULL default '',
  ktai_address varchar(64) NOT NULL default '',
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  c_member_id_invite int(11) NOT NULL default '0',
  PRIMARY KEY  (c_member_ktai_pre_id),
  UNIQUE KEY session (session)
) TYPE=MyISAM;

--
-- Table structure for table `c_member_pre`
--

CREATE TABLE c_member_pre (
  c_member_pre_id int(11) NOT NULL auto_increment,
  session varchar(255) NOT NULL default '',
  nickname text NOT NULL,
  birth_year smallint(4) NOT NULL default '0',
  birth_month tinyint(2) NOT NULL default '0',
  birth_day tinyint(2) NOT NULL default '0',
  public_flag_birth_year enum('public','friend','private') NOT NULL default 'public',
  r_date datetime NOT NULL default '0000-00-00 00:00:00',
  is_receive_mail tinyint(1) NOT NULL default '0',
  is_receive_daily_news tinyint(1) NOT NULL default '0',
  is_receive_ktai_mail tinyint(1) NOT NULL default '0',
  c_member_id_invite int(11) NOT NULL default '0',
  password text NOT NULL,
  pc_address text NOT NULL,
  ktai_address text NOT NULL,
  regist_address text NOT NULL,
  easy_access_id text NOT NULL,
  c_password_query_id int(11) NOT NULL default '0',
  c_password_query_answer text NOT NULL,
  PRIMARY KEY  (c_member_pre_id),
  UNIQUE KEY session (session)
) TYPE=MyISAM;

--
-- Table structure for table `c_member_pre_profile`
--

CREATE TABLE c_member_pre_profile (
  c_member_pre_profile_id int(11) NOT NULL auto_increment,
  c_member_pre_id int(11) NOT NULL default '0',
  c_profile_id int(11) NOT NULL default '0',
  c_profile_option_id int(11) NOT NULL default '0',
  value text NOT NULL,
  public_flag enum('public','friend','private') NOT NULL default 'public',
  PRIMARY KEY  (c_member_pre_profile_id),
  KEY c_member_pre_id (c_member_pre_id),
  KEY c_profile_id (c_profile_id),
  KEY c_profile_option_id (c_profile_option_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_member_profile`
--

CREATE TABLE c_member_profile (
  c_member_profile_id int(11) NOT NULL auto_increment,
  c_member_id int(11) NOT NULL default '0',
  c_profile_id int(11) NOT NULL default '0',
  c_profile_option_id int(11) NOT NULL default '0',
  value text NOT NULL,
  public_flag enum('public','friend','private') NOT NULL default 'public',
  PRIMARY KEY  (c_member_profile_id),
  KEY c_member_id (c_member_id),
  KEY c_profile_id (c_profile_id),
  KEY c_profile_option_id (c_profile_option_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_member_secure`
--

CREATE TABLE c_member_secure (
  c_member_secure_id int(11) NOT NULL auto_increment,
  c_member_id int(11) NOT NULL default '0',
  hashed_password blob NOT NULL,
  hashed_password_query_answer blob NOT NULL,
  pc_address blob NOT NULL,
  ktai_address blob NOT NULL,
  regist_address blob NOT NULL,
  easy_access_id blob NOT NULL,
  PRIMARY KEY  (c_member_secure_id),
  UNIQUE KEY c_member_id (c_member_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_message`
--

CREATE TABLE c_message (
  c_message_id int(11) NOT NULL auto_increment,
  c_member_id_to int(11) NOT NULL default '0',
  c_member_id_from int(11) NOT NULL default '0',
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  body text NOT NULL,
  subject text NOT NULL,
  is_read tinyint(1) NOT NULL default '0',
  is_syoudaku tinyint(1) NOT NULL default '0',
  is_deleted_to tinyint(1) NOT NULL default '0',
  is_deleted_from tinyint(1) NOT NULL default '0',
  is_send tinyint(1) NOT NULL default '0',
  is_hensin tinyint(1) NOT NULL default '0',
  hensinmoto_c_message_id int(8) NOT NULL default '0',
  is_kanzen_sakujo_from tinyint(1) NOT NULL default '0',
  is_kanzen_sakujo_to tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (c_message_id),
  KEY c_member_id_from (c_member_id_from),
  KEY c_member_id_to (c_member_id_to)
) TYPE=MyISAM;

--
-- Table structure for table `c_password_query`
--

CREATE TABLE c_password_query (
  c_password_query_id int(11) NOT NULL auto_increment,
  c_password_query_question text NOT NULL,
  PRIMARY KEY  (c_password_query_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_pc_address_pre`
--

CREATE TABLE c_pc_address_pre (
  c_pc_addess_pre_id int(11) NOT NULL auto_increment,
  c_member_id int(11) NOT NULL default '0',
  pc_address text NOT NULL,
  session varchar(32) NOT NULL default '',
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (c_pc_addess_pre_id),
  KEY c_member_id (c_member_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_profile`
--

CREATE TABLE c_profile (
  c_profile_id int(11) NOT NULL auto_increment,
  name text NOT NULL,
  caption text NOT NULL,
  is_required tinyint(1) NOT NULL default '0',
  public_flag_edit tinyint(1) NOT NULL default '0',
  public_flag_default enum('public','friend','private') NOT NULL default 'public',
  form_type enum('text','textarea','select','checkbox','radio') NOT NULL default 'text',
  sort_order int(11) NOT NULL default '0',
  disp_regist tinyint(1) NOT NULL default '0',
  disp_config tinyint(1) NOT NULL default '1',
  disp_search tinyint(1) NOT NULL default '1',
  val_type text NOT NULL,
  val_regexp text NOT NULL,
  val_min int(11) NOT NULL default '0',
  val_max int(11) NOT NULL default '0',
  PRIMARY KEY  (c_profile_id),
  KEY sort_order (sort_order)
) TYPE=MyISAM;

--
-- Table structure for table `c_profile_option`
--

CREATE TABLE c_profile_option (
  c_profile_option_id int(11) NOT NULL auto_increment,
  c_profile_id int(11) NOT NULL default '0',
  value text NOT NULL,
  sort_order int(11) NOT NULL default '0',
  PRIMARY KEY  (c_profile_option_id),
  KEY c_profile_id (c_profile_id),
  KEY sort_order (sort_order)
) TYPE=MyISAM;

--
-- Table structure for table `c_profile_pref`
--

CREATE TABLE c_profile_pref (
  c_profile_pref_id int(11) NOT NULL auto_increment,
  pref text NOT NULL,
  sort_order int(11) NOT NULL default '0',
  PRIMARY KEY  (c_profile_pref_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_review`
--

CREATE TABLE c_review (
  c_review_id int(11) NOT NULL auto_increment,
  title text NOT NULL,
  release_date varchar(100) NOT NULL default '0000-00-00',
  manufacturer text NOT NULL,
  author text NOT NULL,
  c_review_category_id int(11) NOT NULL default '0',
  image_small text NOT NULL,
  image_medium text NOT NULL,
  image_large text NOT NULL,
  url text NOT NULL,
  asin varchar(100) NOT NULL default '',
  list_price varchar(100) NOT NULL default '0',
  retail_price varchar(100) NOT NULL default '0',
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (c_review_id),
  KEY c_review_category_id (c_review_category_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_review_category`
--

CREATE TABLE c_review_category (
  c_review_category_id int(11) NOT NULL default '0',
  category varchar(100) NOT NULL default '',
  category_disp varchar(100) NOT NULL default '',
  sort_order int(11) NOT NULL default '0',
  PRIMARY KEY  (c_review_category_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_review_clip`
--

CREATE TABLE c_review_clip (
  c_review_clip_id int(11) NOT NULL auto_increment,
  c_member_id int(11) NOT NULL default '0',
  c_review_id int(11) NOT NULL default '0',
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (c_review_clip_id),
  KEY c_member_id (c_member_id,c_review_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_review_comment`
--

CREATE TABLE c_review_comment (
  c_review_comment_id int(11) NOT NULL auto_increment,
  c_review_id int(11) NOT NULL default '0',
  c_member_id int(11) NOT NULL default '0',
  body text NOT NULL,
  satisfaction_level int(11) NOT NULL default '0',
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (c_review_comment_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_rss_cache`
--

CREATE TABLE c_rss_cache (
  c_rss_cache_id int(11) NOT NULL auto_increment,
  c_member_id int(11) NOT NULL default '0',
  subject text NOT NULL,
  body text NOT NULL,
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  link text NOT NULL,
  cache_date datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (c_rss_cache_id),
  KEY c_member_id (c_member_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_schedule`
--

CREATE TABLE c_schedule (
  c_schedule_id int(11) NOT NULL auto_increment,
  c_member_id int(11) NOT NULL default '0',
  title text NOT NULL,
  body text NOT NULL,
  start_date date NOT NULL default '0000-00-00',
  start_time time default NULL,
  end_date date NOT NULL default '0000-00-00',
  end_time time default NULL,
  is_receive_mail tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (c_schedule_id),
  KEY c_member_id (c_member_id)
) TYPE=MyISAM;

--
-- Table structure for table `c_searchlog`
--

CREATE TABLE c_searchlog (
  c_searchlog_id int(11) NOT NULL auto_increment,
  searchword text NOT NULL,
  r_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  c_member_id int(11) NOT NULL default '0',
  PRIMARY KEY  (c_searchlog_id),
  KEY c_member_id (c_member_id)
) TYPE=MyISAM PACK_KEYS=0;

--
-- Table structure for table `c_siteadmin`
--

CREATE TABLE c_siteadmin (
  c_siteadmin_id int(11) NOT NULL auto_increment,
  target varchar(100) NOT NULL default '',
  body text NOT NULL,
  r_date date NOT NULL default '0000-00-00',
  PRIMARY KEY  (c_siteadmin_id),
  KEY target (target)
) TYPE=MyISAM;

--
-- Table structure for table `c_sns_config`
--

CREATE TABLE c_sns_config (
  c_sns_config_id int(11) NOT NULL default '0',
  key_name varchar(100) NOT NULL default '',
  border_00 text NOT NULL,
  border_01 text NOT NULL,
  border_02 text NOT NULL,
  border_03 text NOT NULL,
  border_04 text NOT NULL,
  border_05 text NOT NULL,
  border_06 text NOT NULL,
  border_07 text NOT NULL,
  border_08 text NOT NULL,
  border_09 text NOT NULL,
  border_10 text NOT NULL,
  bg_00 text NOT NULL,
  bg_01 text NOT NULL,
  bg_02 text NOT NULL,
  bg_03 text NOT NULL,
  bg_04 text NOT NULL,
  bg_05 text NOT NULL,
  bg_06 text NOT NULL,
  bg_07 text NOT NULL,
  bg_08 text NOT NULL,
  bg_09 text NOT NULL,
  bg_10 text NOT NULL,
  PRIMARY KEY  (c_sns_config_id)
) TYPE=MyISAM;
