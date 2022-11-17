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

// request
```
POST http://localhost:8080/v1/token
```

//response
```json
{
	"data": {
		"id": "38014b5e-ac7b-459e-8b10-48aaacba44a5",
		"created_at": 1668612324
	}
}
```

2. Create subject.
   
// request
```
POST http://localhost:8080/v1/subject/38014b5e-ac7b-459e-8b10-48aaacba44a5 <-- created_token_id
BODY
{
    "name": "Anything you want"
}
```

//response
```json
{
	"data": {
		"token": "38014b5e-ac7b-459e-8b10-48aaacba44a5",
		"name": "Anything you want",
		"id": "15b51422-e06a-4fa2-993c-e18b048f46d7"
	}
}
```

3. Attach tags to a subject

//request
```
PUT http://localhost:8080/v1/subject/38014b5e-ac7b-459e-8b10-48aaacba44a5
BODY
{
    "id": "15b51422-e06a-4fa2-993c-e18b048f46d7",
    "tags": ["some", "tags"]
}
```

//response
```json
{
	"data": {
		"token": "38014b5e-ac7b-459e-8b10-48aaacba44a5",
		"name": "test",
		"id": "15b51422-e06a-4fa2-993c-e18b048f46d7",
		"tags": [
			"some",
			"tags"
		]
	}
}
```

4. Get subjects by tags

```
GET http://localhost:8080/v1/subject/38014b5e-ac7b-459e-8b10-48aaacba44a5
BODY
{
    "tags": ["some"]
}
```

//response
```json
{
	"data": [
		{
			"token": "38014b5e-ac7b-459e-8b10-48aaacba44a5",
			"name": "test",
			"id": "15b51422-e06a-4fa2-993c-e18b048f46d7",
			"tags": [
				"some",
			    "tags"
			]
		}
	]
}
```