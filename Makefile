.PHONY: deploy

deploy:
	composer install --optimize-autoloader --no-dev
	zip -q -r release.zip . -x infrastructure\* tests\* .idea\*
	sam package --region eu-north-1 --output-template-file .stack.yaml --s3-bucket hmazter-bref-lumen
	sam deploy --region eu-north-1 --template-file .stack.yaml --capabilities CAPABILITY_IAM --stack-name hmazter-bref-lumen

local:
	sam local start-api
