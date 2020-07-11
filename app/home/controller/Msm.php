<?php 

namespace app\home\controller;
use think\Controller;
use think\Db;
use alidayu\top\TopClient;
use alidayu\top\request\AlibabaAliqinFcSmsNumSendRequest;

require_once EXTEND_PATH.'alisms/vendor/autoload.php';

use Aliyun\Core\Config;
use Aliyun\Core\Profile\DefaultProfile;
use Aliyun\Core\DefaultAcsClient;
use Aliyun\Api\Sms\Request\V20170525\SendSmsRequest;
use Aliyun\Api\Sms\Request\V20170525\QuerySendDetailsRequest;

use fusms\Ucpaas;

use yuntongxun\Rest;
// 加载区域结点配置
Config::load();

class Msm extends Controller{

	public function testsend()
	{
		$code = 458645;
		$res = $this->sendsms(2175, $code ,15769272583);
		dump($res);
	}

/*
	public function sendsms($uid = 0, $code ,$phone)
	{
		if(!$code){
			return false;
		}

		if(!$phone){
			return false;
		}

		//初始化必填
		$options['accountsid']='f7acc233dc79a57fc37c791db2ccc54c';
		$options['token']='75b58c0ba10f39199fe79c3f54dc5e08';


		//初始化 $options必填
		$ucpass = new Ucpaas($options);

		//开发者账号信息查询默认为json或xml

		$ucpass->getDevinfo('json');
		$appId = "38f8f22da49d4681b9d1aca4ebdf22af";
		$to = $phone;
		$templateId = "128304";
		$param=$code;

		$res = $ucpass->templateSMS($appId,$to,$templateId,$param);
		$arr = json_decode($res,1);
		if(isset($arr["resp"]["respCode"]) && $arr["resp"]["respCode"] == "000000"){
			return true;
		}else{
			return false;
		}
	}
*/
	/**
	 * 短信宝 http://www.smsbao.com/
	 */
	/*
	public function sendsms($uid = 0, $code ,$phone)
	{
		$conf = getconf('');

		if(!$code){
			return false;
		}

		if(!$phone){
			return false;
		}

		$content = '您的验证码为'.$code.'，在10分钟内有效。';
		
		$smsapi = "http://api.smsbao.com/"; //短信网关
		$user = $conf['msm_appkey']; //短信平台帐号  调用数据库字段
		$pass = md5($conf['msm_secretkey']); //短信平台密码  调用数据库字段
		$content="【".$conf['msm_SignName']."】".$content;//要发送的短信内容  调用数据库字段
		$phone = $phone;
		$sendurl = $smsapi."sms?u=".$user."&p=".$pass."&m=".$phone."&c=".urlencode($content);
		
		$result =file_get_contents($sendurl) ;
		if($result != 0){
			return false;
		}else{
			return true;
		}

	}

*/
	/*
	public function sendsms($uid = 0, $code ,$phone){
		$conf = getconf('');


		$url="https://api.dingdongcloud.com/v1/sms/sendyzm";
        $data = "apikey=%s&mobile=%s&content=%s";
        $content = "【".$conf['msm_SignName']."】你的验证码是".$code."，请在10分钟内输入。";
        $content = urlencode($content);
        $apikey = $conf['msm_appkey'];
        $mobile = $phone; 
        
        $rdata = sprintf($data, $apikey, $mobile, $content);
        $url = $url.'?'.$rdata;
       	
       	$api = controller('Api');
       	$result = $api->curlfun($url);
       	$arr = json_decode($result,1);
        if($arr['code'] == 1){
        	return true;
        }else{
        	return false;
        }


        
	}
	
	

	*/
				/**
	*聚合短信
	
	*/
/* 	public function sendsms($uid = 0, $code ,$phone)
	{
		$conf = getconf('');
		header('content-type:text/html;charset=utf-8');
  
			$sendUrl = 'http://v.juhe.cn/sms/send'; //短信接口的URL
			 
			$smsConf = array(
				'key'   => $conf['msm_secretkey'], //您申请的APPKEY
				'mobile'    => "$phone", //接受短信的用户手机号码
				'tpl_id'    => $conf['msm_TCode'], //您申请的短信模板ID，根据实际情况修改
				'tpl_value' =>'#code#='.$code.'&#company#=聚合数据' //您设置的模板变量，根据实际情况修改
			);
			 
			$content = $this->juhecurl($sendUrl,$smsConf,1); //请求发送短信
			 
			if($content){
				$result = json_decode($content,true);
				$error_code = $result['error_code'];
				if($error_code == 0){
					//状态为0，说明短信发送成功
					return true;
					//echo "短信发送成功,短信ID：".$result['result']['sid'];
				}else{
					//状态非0，说明失败
					$msg = $result['reason'];
					echo "短信发送失败(".$error_code.")：".$msg;
				}
			}else{
				//返回内容异常，以下可根据业务逻辑自行修改
				echo "请求发送短信失败";
			}
		
		
	} */
	function juhecurl($url,$params=false,$ispost=0){
    $httpInfo = array();
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
    curl_setopt( $ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22' );
    curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 30 );
    curl_setopt( $ch, CURLOPT_TIMEOUT , 30);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
    if( $ispost )
    {
        curl_setopt( $ch , CURLOPT_POST , true );
        curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
        curl_setopt( $ch , CURLOPT_URL , $url );
    }
    else
    {
        if($params){
            curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
        }else{
            curl_setopt( $ch , CURLOPT_URL , $url);
        }
    }
    $response = curl_exec( $ch );
    if ($response === FALSE) {
        //echo "cURL Error: " . curl_error($ch);
        return false;
    }
    $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
    $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
    curl_close( $ch );
    return $response;
}
	
	

	/**
	 * 阿里云短信
	 */

	public function sendsms($phone, $code){
			
		$config = \app\admin\model\Config::getInfo();
		
		//$conf = getconf('');
		$conf['msm_SignName']=$config['setting']["signName"];
		$conf['msm_TCode']=$config['setting']["templateCode"];
		 $conf['msm_appkey']=$config['setting']["accessKeyId"];
		 $conf['msm_secretkey']=$config['setting']["accessKeySecret"];
		// 初始化SendSmsRequest实例用于设置发送短信的参数
        $request = new SendSmsRequest();

        // 必填，设置雉短信接收号码
        $request->setPhoneNumbers($phone);

        // 必填，设置签名名称
        $request->setSignName($conf['msm_SignName']);

        // 必填，设置模板CODE
        $request->setTemplateCode($conf['msm_TCode']);

        // 可选，设置模板参数
        $templateParam = Array( "code"=>$code);

        if($templateParam) {
            $request->setTemplateParam(json_encode($templateParam));
        }

        // 暂时不支持多Region
        $region = "cn-hangzhou";
        // 服务结点
        $endPointName = "cn-hangzhou";
        // 短信API产品名
        $product = "Dysmsapi";
        // 短信API产品域名
        $domain = "dysmsapi.aliyuncs.com";
        // 初始化用户Profile实例
        $profile = DefaultProfile::getProfile($region, $conf['msm_appkey'], $conf['msm_secretkey']);
		
        // 增加服务结点
        DefaultProfile::addEndpoint($endPointName, $region, $product, $domain);

        $this->acsClient = new DefaultAcsClient($profile);
        // 发起访问请求
        $acsResponse = $this->acsClient->getAcsResponse($request);

        // 打印请求结果
        // var_dump($acsResponse);
		return json_decode(json_encode($acsResponse),TRUE);
        
	}

	/*
	public function sendsms($uid = 0, $code ,$phone)
	{
		$conf = getconf('');
		$c = new TopClient();
		$c ->appkey = trim($conf['msm_appkey']) ;
		$c ->secretKey = trim($conf['msm_secretkey']) ;
		$req = new AlibabaAliqinFcSmsNumSendRequest;
		$req ->setExtend( $uid );
		$req ->setSmsType( "normal" );
		$req ->setSmsFreeSignName( trim($conf['msm_SignName']) );
		$req ->setSmsParam("{\"code\":\"$code\"}");
		$req ->setRecNum( trim($phone) );
		$req ->setSmsTemplateCode( trim($conf['msm_TCode']) );
		
		

		$resp = $c ->execute( $req );
		$array = json_decode(json_encode($resp),TRUE);
		dump($array);
		if(isset($array['result']["success"]) && $array['result']["success"] == "true"){
			return true;
		}else{
			return false;
		}
		
	}

	*/
/*

	public function sendsms($uid = 0, $code ,$phone)
	{
		$conf = getconf('');
		return $this->sendTemplateSMS($phone,$code,$conf['msm_TCode'],$conf);
	}

	public function sendTemplateSMS($to,$datas,$tempId,$conf)
	{
		 // 初始化REST SDK
	     
		//主帐号,对应开官网发者主账号下的 ACCOUNT SID
		$accountSid= $conf['msm_secretkey'];

		//主帐号令牌,对应官网开发者主账号下的 AUTH TOKEN
		$accountToken= $conf['msm_appkey'];

		//应用Id，在官网应用列表中点击应用，对应应用详情中的APP ID
		//在开发调试的时候，可以使用官网自动为您分配的测试Demo的APP ID
		$appId='8a216da85da6adf7015de42a6fc21628';

		//请求地址
		//沙盒环境（用于应用开发调试）：sandboxapp.cloopen.com
		//生产环境（用户应用上线使用）：app.cloopen.com
		$serverIP='app.cloopen.com';


		//请求端口，生产环境和沙盒环境一致
		$serverPort='8883';

		//REST版本号，在官网文档REST介绍中获得。
		$softVersion='2013-12-26';

	     $rest = new Rest($serverIP,$serverPort,$softVersion);
	     $rest->setAccount($accountSid,$accountToken);
	     $rest->setAppId($appId);
	    
	     // 发送模板短信
	     
	     $result = $rest->sendTemplateSMS($to,$datas,$tempId);
	     dump($result);
	     if($result == NULL ) {
	         return false;
	         break;
	     }
	     if($result->statusCode == '000000'){
	     	return true;
	     }else{
	     	return false;
	     }
	     
	}


*/


}

