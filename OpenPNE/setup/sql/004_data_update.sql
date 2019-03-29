SET NAMES ujis;

DELETE FROM `c_review_category`;
INSERT INTO `c_review_category` (`c_review_category_id`, `category`, `category_disp`, `sort_order`) VALUES (1,'Books','本',0),(2,'ForeignBooks','洋書',0),(3,'Electronics','エレクトロニクス',0),(4,'Kitchen','ホーム&キッチン',0),(5,'Music','ミュージック',0),(6,'DVD','DVD/ビデオ',0),(7,'Software','ソフトウェア',0),(8,'VideoGames','ゲーム',0),(9,'Toys','おもちゃ&ホビー',0);
