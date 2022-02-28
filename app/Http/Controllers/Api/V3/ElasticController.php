<?php

namespace App\Http\Controllers\Api\V3;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;
use GuzzleHttp\Ring\Client\MockHandler;

class ElasticController extends Controller
{
   protected $client; 
   public function __construct()
   {
      $serializer = '\Elasticsearch\Serializers\SmartSerializer';
      $this->client = \Elasticsearch\ClientBuilder::create()
    					->setHosts(array('acb-gdpr-elasticsearch01.unir.cloud'.":".'9200'))
    					->setConnectionPool('\Elasticsearch\ConnectionPool\StaticConnectionPool', [])
    					->setRetries(20)
    					->setSerializer($serializer)
    					->build();

   }

   public function showIndex()
   {
      $params = [
         'index' => 'gdpr_request_log_test_v1',
         'id'    => '-PjJP38BYMpeGHZgHTde'
      ];
      
      $source = $this->client->getSource($params);
      return json_encode($source, JSON_UNESCAPED_SLASHES);

   }
}
