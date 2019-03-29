【({$SNS_NAME})】デイリー・ニュース [({$smarty.now|date_format:"%Y. %m. %d"})]
━━ ({$HOME_PATH}) ━━━━━━━━━━━━━━━━

({$CATCH_COPY})({$SNS_NAME})

本日の最新情報・新着ランキング　[({$smarty.now|date_format:"%Y. %m. %d/%a"})]

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

({$c_member.nickname})さん

({$CATCH_COPY})({$SNS_NAME}) からの
本日の最新情報のお知らせです。

―――――――――――――――――――――――――――――
■INDEX■
―――――――――――――――――――――――――――――

◆({$WORD_MY_FRIEND})の最新日記
◆参加コミュニティの最新書き込み
◆({$c_member.nickname})さんのページへのアクセス数


―――――――――――――――――――――――――――――
◆({$WORD_MY_FRIEND})の最新日記◆
―――――――――――――――――――――――――――――

({foreach from=$diary_friend_list item=item})
◇ニックネーム：({$item.nickname})さん
　タイトル　　：({$item.subject})
　URL 　　　　：({$ABSOLUTE_PATH})page.php?p=fh_diary&target_c_diary_id=({$item.c_diary_id})

({/foreach})

―――――――――――――――――――――――――――――
◆参加コミュニティの最新書き込み◆
―――――――――――――――――――――――――――――

({$c_member.nickname})さんが参加しているコミュニティ掲示板の更新トピックです。

({foreach from=$c_commu_topic_comment_list item=item})
◇名　前　：({$item.c_commu_name})
　トピック：({$item.c_commu_topic_name})
　URL　   ：({$ABSOLUTE_PATH})page.php?p=c_topic_detail&target_c_commu_topic_id=({$item.c_commu_topic_id})

({/foreach})

―――――――――――――――――――――――――――――
◆({$c_member.nickname})さんのページへのアクセス数◆
―――――――――――――――――――――――――――――

◇最近、({$c_member.nickname})さんのページに訪れた人数を確かめる
（あしあとを確認）

　→　URL:({$ABSOLUTE_PATH})page.php?p=h_ashiato

◇({$c_member.nickname})さんのページに訪れた人数：({$ashiato_num})アクセス


―――――――――――――――――――――――――――――

メール受信の設定変更はログイン後の「設定変更」より
おこなってください。

▼({$SNS_NAME})のデイリー・ニュースとは？

　あなたの({$WORD_MY_FRIEND})からの最新情報や、参加コミュニティの書き込み
　情報など、毎日の更新情報をメールでお知らせします。 

▼({$SNS_NAME})のデイリー・ニュース　配信停止はこちらから
　→　({$ABSOLUTE_PATH})page.php?p=h_config


({$inc_signature})