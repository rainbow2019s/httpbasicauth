<?php namespace Rainbow2019s\BasicHttpAuth\middleware;

use Closure;
class BasicHttpAuth{
  public function handle($request,Closure $next)
  {
      $authorization=function($ciphertext,$plaintext) {
        return substr($ciphertext,6)==base64_encode($plaintext);
      };

      $auth= $authorization($request->header('authorization'),env('BASiC_HTTP_AUTH'));
  
      if(!$auth){
          $content=['msg'=>'error','dataInfo'=>new \stdClass];
          return response(json_encode($content),401)->header('Content-type','application/json');
        };

      return $next($request);
    }
}