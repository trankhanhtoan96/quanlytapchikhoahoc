<?php

use Psr\Http\Message\ResponseInterface as RS;
use Psr\Http\Message\ServerRequestInterface as SR;

$app->get('/cron/youtube', function (SR $rq, RS $rs, array $ag) {
    shell_exec('sshpass -p "123123" ssh -o StrictHostKeyChecking=no root@13.229.125.113 "cd /root/view-youtube; python3 yt.py /root/.mozilla/firefox/lqyk3r2r.trankhanhtoan321/ https://www.youtube.com/watch?v=cE6bPET4Iqw 60 1 0" > /dev/null/ 2>&1 &');
    return 'done!';
});