## はじめに
私が作成しました、ポートフォリオの紹介記事です。
作成した背景、主な機能、反省点などを記載しました。

## アプリ概要
#### 農家と飲食店を規格外野菜で繋ぐアプリです。

+ アプリURL:http://vege-cone.com
+ GitHubURL:https://github.com/yumayamaguchi/vege-cone

[![Image from Gyazo](https://i.gyazo.com/06cdc256940c421d6d979da807fa3c67.jpg)](https://gyazo.com/06cdc256940c421d6d979da807fa3c67)

[![Image from Gyazo](https://i.gyazo.com/8aeb0e5c76399f62b296df5791f6ccda.jpg)](https://gyazo.com/8aeb0e5c76399f62b296df5791f6ccda)


## 使用技術
+ フロント：HTML/CSS/MDBootstrap
+ バックエンド：Laravel(6.2)
+ DB:MySQL,本番環境はRDS(MySQL)
+ インフラ：AWS
+ ソース管理：Git/GitHub


## 開発背景
実家が農家をしており、先日育てていたほうれん草が病気になり全て廃棄処分を行なっていました。自分の中では勿体無いなという思いがありつつも、昨今は食料問題が報道されております。食料問題が社会課題になっている中、廃棄処分も多いというこの矛盾を少しでも解決できればと思い、サービスを作成しました。規格外品の野菜と消費者を繋ぐサービスは実際に存在していますが、私なりに廃棄処分が無くならない原因を考えた上でその原因を少しでも解決できればと思いました。

### <私が考える廃棄が無くならない原因>
+ 送料がかかってしまうため、小分けして郵送できない
+ 送料をかけないようにすると、販売量が多くなる
+ 農家の多くが高齢者のため、ITサービスを使用する人が少ない

### <解決案>
+ 材料を多く使う飲食店に特化することで、一度で多くの材料を配送できるため、手間や送料が低減できる
+ 高齢者の方にも使いやすいようにサービスの簡略化
+ 積極的に規格外品を販売していただく事で、生産者のアピールにもできるような仕組みづくり
+ アピールする事で、規格品の直販など生産者の販売ルートの拡販ができるようになる

## 使用イメージ

#### A.生産者側の基本操作

1. ログイン
1. 投稿ボタンクリック
1. 商品名や金額など必要情報の記入
1. 商品出品完了


[![Image from Gyazo](https://i.gyazo.com/a8ce5c5e65fee59331083e369a5c0e88.gif)](https://gyazo.com/a8ce5c5e65fee59331083e369a5c0e88)

#### B.飲食店側の基本操作

1. ログイン
1. 商品選択
1. 数量選択
1. カート画面から決済処理


[![Image from Gyazo](https://i.gyazo.com/89b8d305e09f89c939cf41836d7179ba.gif)](https://gyazo.com/89b8d305e09f89c939cf41836d7179ba)


## 機能要件
#### <生産者>
+ 新規登録
+ ログイン、ゲストログイン、ログアウト
+ ユーザー情報更新
+ 商品記事投稿
+ 記事更新、削除
+ 販売された商品ごとに1P/キロ貢献度を付与

#### <飲食店>
+ 新規登録
+ ログイン、ゲストログイン、ログアウト
+ ユーザー情報更新
+ カート機能
+ 決済機能（stripeAPI）
+ 決済処理後、カートの削除処理

#### <共通>
+ ページネーション機能
+ 生産者一覧
+ 生産者詳細表示

## データ設計
[![Image from Gyazo](https://i.gyazo.com/6e340815acad013f60c5e117117a9449.png)](https://gyazo.com/6e340815acad013f60c5e117117a9449)

以下、作成したテーブルです。

|テーブル名|説明|
|:--|:--|
|usres|生産者テーブル|
|restaurants|飲食店テーブル|
|products|商品テーブル|
|carts|カートテーブル|
|purchased|購入された商品のテーブル|

#### <ポイント>

①外部キー制約
user_idやrestaurant_idなどにはusersテーブルと同じ値しか入れないようにする為に外部キー制約を行いました。

②imagesをハッシュ名で保存
少しずれますが、直接URLにアクセスされないようにハッシュ名で保存するようにしました。
## AWSデプロイ

[![Image from Gyazo](https://i.gyazo.com/aa2b109ce825fbfd40948fd083f62168.png)](https://gyazo.com/aa2b109ce825fbfd40948fd083f62168)


### <AWSでデプロイした理由>

①リソースが柔軟な為
飲食店向けのサービスのため、繁盛しやすいGWや年末の時期にアクセスが集中すると考えたため、リソースが柔軟なAWSを選択しました。

②障害があったとき、システム全体で対応できるようになりたいから。
これは自分自身の問題ですが、少しでもインフラの知識を身につけることにより、実務に入ってから障害があったときシステム全体で対応できるようになると思ったからです。

## こだわり
①サービスの簡略化
どなたにも手軽に使っていただきたいという思いから、トップページには「かんたん3ステップ」という説明を記載し、簡単に操作できるよう心がけました。

②生産者一覧で貢献度を付与
どれだけ規格外品を販売し、廃棄を減らしたかを数値化しました。生産者にとって販売のモチベーションになる為、このような数値を表記しました。

## 苦労点

①マルチ認証システムの構築
ログインのシステムがわかっておらず、構築に苦労しました。ログインシステムだけでなく、モデルの使い方やコントローラの理解が深まりました。学んだことをQiita記事にしてみました。→https://qiita.com/yyuuuu/items/502641dc5598936eb6a0

②AWSへのデプロイ
VPCやEC2など、聞き慣れない用語がたくさんあった為、意味や仕組みを理解するのに苦労しました。また、開発環境では機能していたにもかかわらず、本番環境でエラーが多発し、対処するのに苦労しました。


## 反省点
①必要な機能がまだある（随時追加してきます）

+ ユーザー削除
+ カテゴリー別検索機能
+ 商品検索機能
+ 登録確認機能
+ お気に入り機能
+ 注文履歴閲覧機能
+ 商品レビュー機能
+ 評価機能
+ 注文メール送付機能

②誰がみても分かりやすいコードの入力
コメントなどをつけてなるべくわかるように工夫しましたが、改善点は多々あると思うのでこれから勉強していきます。

③テストコードが無し
バグを引き起こしてしまう可能性があるので、こちらについても勉強していきます。
