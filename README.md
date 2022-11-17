# tagnow-api

Simple service for tagging anything you want.

# install

```bash
# git clone git@github.com:jeyroik/tagnow-api.git
# cd tagnow-api
# composer u
# vendor/bin/extas-cfg-php generate
# vendor/bin/extas install -t vendor/jeyroik/extas-foundation/resources -s resources
# ln -s vendor/jeyroik/extas-api/public/index.php index.php
# php -S localhost:8080
```

After that you can touch http://localhost:8080/help

# using

1. Create token.

```
POST http://localhost:8080/v1/token
```

2. Create subject.

```
POST http://localhost:8080/v1/subject/<created_token>
BODY
{
    "name": "Anything you want"
}
```

3. Attach tags to a subject

```
PUT http://localhost:8080/v1/subject/<created_token>
BODY
{
    "id": <created_subject_id>,
    "tags": ["some", "tags"]
}
```

4. Get subjects by tags

```
GET http://localhost:8080/v1/subject/<created_token>
BODY
{
    "tags": ["some"]
}
```