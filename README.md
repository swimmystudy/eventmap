# EventMap by SwimmyStudy
アプリケーションを作りながら色々勉強しようというプロジェクト  
とりあえず簡単なREADMEを作成

## 使い方
### Git
以下のコマンドでリポジトリをcloneします。  
`git clone --recursive git@github.com:swimmystudy/eventmap.git`


### MySQL
eventmapという名称でデータベースとユーザを作成します。

以下のコマンドを実行し、DBを最新の状態にします。  
`cd app`  
`Console/cake Migrations.migration run all`


### キャッシュの更新
以下にアクセスするとキャッシュを更新できます。（localhostで実行する例）  
[http://localhost/eventmap/EventCache/update](http://localhost/eventmap/EventCache/update)

以下にアクセスするとキャッシュした全データが表示されます。  
[http://localhost/eventmap/EventCache/get](http://localhost/eventmap/EventCache/get)

以下のような感じで条件でフィルタして表示できます。  
[http://localhost/eventmap/EventCache/get?keyword=ruby&type=&start_day=2012%2F10%2F1&end_day=2012%2F10%2F10](http://localhost/eventmap/EventCache/get?keyword=ruby&type=&start_day=2012%2F10%2F1&end_day=2012%2F10%2F10)

とりあえず、ここまで。
