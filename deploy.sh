rm -rf var/*; rm -rf pub/static/*; bin/magento setup:static-content:deploy -f; php bin/magento indexer:reindex; php bin/magento cache:flush;
