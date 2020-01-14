<?php namespace Rainbow2019s\HttpBasicAuth\middleware;

use Closure;
class HttpBasicAuth{
  public function handle($request,Closure $next)
  {
      $authorization=function($ciphertext,$plaintext) {
        if(empty($ciphertext) or empty($plaintext)){
          return false;
        }
        return substr($ciphertext,6)==base64_encode($plaintext);
      };

      $auth= $authorization($request->header('authorization'),env('HTTP_BASIC_AUTH'));
  
      if(!$auth){
          $content=['msg'=>'error','data'=>['datainfo'=>new \stdClass]];
          return response(json_encode($content),401)->header('Content-type','application/json');
        };

      return $next($request);
    }
}