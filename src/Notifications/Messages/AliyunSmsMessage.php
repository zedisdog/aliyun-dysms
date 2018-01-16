<?php
/**
 * Created by PhpStorm.
 * User: zed
 * Date: 18-1-16
 * Time: 下午2:15
 */

namespace Dezsidog\AliyunSDK\Sms\Notifications\Messages;


use Dezsidog\AliyunSDK\Sms\Request\SendSmsRequest;

class AliyunSmsMessage
{
    protected $phone;

    protected $sign_name;

    protected $template_code;

    protected $template_param;

    public function __construct(string $phone, string $sign_name, string $template_code, array $template_param)
    {
        $this->phone = $phone;
        $this->sign_name = $sign_name;
        $this->template_code = $template_code;
        $this->template_param = $template_param;
    }

    public function getRequest()
    {
        // 初始化SendSmsRequest实例用于设置发送短信的参数
        $request = new SendSmsRequest();

        // 必填，设置短信接收号码
        $request->setPhoneNumbers($this->phone);

        // 必填，设置签名名称，应严格按"签名名称"填写，请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/sign
        $request->setSignName($this->sign_name);

        // 必填，设置模板CODE，应严格按"模板CODE"填写, 请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/template
        $request->setTemplateCode($this->template_code);

        // 可选，设置模板参数, 假如模板中存在变量需要替换则为必填项
        $request->setTemplateParam(json_encode($this->template_param));

        // 可选，设置流水号
//        $request->setOutId("yourOutId");

        // 选填，上行短信扩展码（扩展码字段控制在7位或以下，无特殊需求用户请忽略此字段）
//        $request->setSmsUpExtendCode("1234567");
        return $request;
    }
}
