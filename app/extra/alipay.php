<?php
/**
 * 支付宝支付
 */

return [
        //应用ID,您的APPID。
        'app_id' => "2018060560255790",

        //商户私钥, 请把生成的私钥文件中字符串拷贝在此
        'merchant_private_key' => "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCL2+mooXA4dUdeJJSwQHN/hB/jlmrRbbdxB4rg5fMhM32rokDrkzeuIeeRzvlC4SAafR1Mz+Z1Dzrr06w6UL08OTL8j8xX2W1kZI30+MkAteJ5aaAVpEsMkOgm2iPk5L9iPc+BvsuvVbY7MIUxtjKNdOkUitwRGGLf8i3URlIuUAu+zFFIDErzYVJ9MWttFBYUgq8MuJmtpZ52KK+EunKL4aryuDrUoII0ulTOZhayvktlZpEgLaDvJkTlhPQcQch3S9WY5WlvC/wJmFcMr4rEbkkjtFJ2DCsp/YK1bY9IrIrTY/5Ly1GT7xn83MY47SYiSa7QLjzIDKgy3y83aqSLAgMBAAECggEAOelgslvOvQILADeDfgviB14tWi7RolCdEed+oSt2ZjwNAIHaAfHer3MIkT6zxfa0NWOzOzgnBDe/PSFUAn2mLga9Twk4IvQ8MMLWaSaPDIVD9uQ+zldOYDCsgFH5ZPE3MjXH88COVNbX82Be9rur6RkM3l21TDrdzj9YrLpFkzkhrUAUbFtKtfLCSefrva/0nZEuwXWrKpmbxruElQtjJmczN9Mam/BYbb9NB54IgPLpXtmfHsXQ7HweWD/e2au3rSFwlkdGrCUdb3XjojF5ZzLj6VvCApo71BRsWJOtw2xTn9lsGGzC5YIWY1ZqYrBbSGKMHnHmwMawb+CS6HT2yQKBgQDZ/1O1bWSe3BUu7HjNa6Q2MypNtNWIpTyJNwgZewjJa6UxxFJoPxG0NVo82fPzapDM+JTJgh8dLPW4H/BI1+b3qQ92F0Fi1tNntcat8pi6VV4dxEJKAOyjIqCJ4S/69NhxYSNZA5w6cZ7+LSDRuNTIdLAii+evyqbnrUOtcwEWrQKBgQCkPXgCFQOVU09Exllqn9lgkZX/YOud7kgP0az7zWnZorMm3QBg+/XMI2U8q9gayE0X6/JpMVDm4lbJMzdXYNHuPWtYf/jmhC+fFfNFiexxNF+2bnBGYFkZxAYOW0hSMmUaYOnAzR+xEbgnJ/WPMRm77CCdGKnul9JSTbtnazpnFwKBgHeC9Ahd3bD95RshhyTPI2qXaFTLk9ljBSoQon8dpXaPbjQ3dhoyoWkTatI7hvNm89V7Xk6O6LHdCSUVVW0J+FTEOXa7Txx5u9J6pF6Oxk45KOzWwKTDlvfkrvCIJP7HJrYZ1AAj641a5xhf80MmunjfCAUYgD8usYwHwDeh+fHNAoGAbmhD/GJT/lX6u6j7Awph/uDfjMWCnrBIERpKxxrXRU5yUHXQg2HdYlWJALgklhyAdsxOMRjN4efVn3umgD694QG4381nbM7/lFoVJ3IIWDF1BhZHs4ehXgjAaXZDr73g6VKs0McTvtzChs/96zx+qC2b3v9tfM7ivCE1EdirchECgYEAwjQy+ZxIYtL7OxxSe+We8qHChAgIGJdOskJExcaEHsf4ydVg1f9nuQILOOMNKrBL9I3u+xzvNxMsHv4T6CDTC3J5ZYWmja1I3N3bUKzLadXnnxY1O6IM6cCbrl5EUpamhjWnwYpfMjyIfYtqT2gtdE+xBT2BHMBOcwIgiGfYQtM=",

        //异步通知地址
        'notify_url' => "home/notify.html",

        //同步跳转
        'return_url' => "home/alipayreturn.html",

        //编码格式
        'charset' => "UTF-8",

        //签名方式
        'sign_type' => "RSA2",

        //支付宝网关
        'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

        //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
        'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAi9vpqKFwOHVHXiSUsEBzf4Qf45Zq0W23cQeK4OXzITN9q6JA65M3riHnkc75QuEgGn0dTM/mdQ8669OsOlC9PDky/I/MV9ltZGSN9PjJALXieWmgFaRLDJDoJtoj5OS/Yj3Pgb7Lr1W2OzCFMbYyjXTpFIrcERhi3/It1EZSLlALvsxRSAxK82FSfTFrbRQWFIKvDLiZraWediivhLpyi+Gq8rg61KCCNLpUzmYWsr5LZWaRIC2g7yZE5YT0HEHId0vVmOVpbwv8CZhXDK+KxG5JI7RSdgwrKf2CtW2PSKyK02P+S8tRk+8Z/NzGOO0mIkmu0C48yAyoMt8vN2qkiwIDAQAB",
];
