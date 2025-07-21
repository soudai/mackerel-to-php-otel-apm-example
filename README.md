# PHP Demo

このプロジェクトは、Mackerelにトレースを送信するPHPアプリケーションのデモです。

## セットアップ手順

### 1. Composerのインストール

以下のコマンドを実行して、Composerの依存関係をインストールします。

```bash
composer install
```

### 2. `.env`ファイルの設定

`.env.example`ファイルを`.env`にリネームします。

```bash
mv .env.example .env
```

`.env`ファイルを編集し、`Mackerel-Api-Key`に適切なAPIキーを設定してください。
`{YOUR_API_KEY_HERE}` の箇所を実際のAPIキーに置き換えてください。

### 3. サンプルスクリプトの実行
一番シンプルな例です。
以下のコマンドを実行して、サンプルスクリプトを実行します。

```bash
export $(cat .env| grep -v "#" | xargs)
php sample.php
```

これでMackerelにトレースが送信されます。

### 4. ローカルサーバーの起動

Webアプリケーションの例です。
以下のコマンドを実行して、ローカルサーバーを起動します。

```bash
set -a && source .env && set +a && php -S localhost:8888
```

### 5. ブラウザでアクセス

ブラウザで以下のURLにアクセスしてください。

http://127.0.0.1:8888/rolldice?rolls=3&player=hoge

これにより、Mackerelにトレースが送信され、指定されたロール数とプレイヤー名でダイスを振る機能を確認できます。
