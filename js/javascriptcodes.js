function loader(){
        $(document).ready(function() {

            var _0x1569=['203001QoVhgg','1SjjspC','127854SjFSfd','11KRYesZ','514141PcoeRH','281868GsBAMQ','3505rduHUH','103110RzwCLd','1uQTPAa','97816FuCThN'];(function(_0x5ece2d,_0x15cb74){var _0x296c0f=_0x597e;while(!![]){try{var _0x292059=-parseInt(_0x296c0f(0xd2))+parseInt(_0x296c0f(0xd7))+-parseInt(_0x296c0f(0xd6))*parseInt(_0x296c0f(0xd5))+parseInt(_0x296c0f(0xd3))*parseInt(_0x296c0f(0xd0))+-parseInt(_0x296c0f(0xd8))*parseInt(_0x296c0f(0xd9))+-parseInt(_0x296c0f(0xd4))+parseInt(_0x296c0f(0xd1));if(_0x292059===_0x15cb74)break;else _0x5ece2d['push'](_0x5ece2d['shift']());}catch(_0x577bfb){_0x5ece2d['push'](_0x5ece2d['shift']());}}}(_0x1569,0x23699));function _0x597e(_0x5286cf,_0xc74941){return _0x597e=function(_0x156910,_0x597e9a){_0x156910=_0x156910-0xd0;var _0xe35923=_0x1569[_0x156910];return _0xe35923;},_0x597e(_0x5286cf,_0xc74941);}var username2='fcheck',password2='p@ssth1sw0rdfCh3ckk';
            $('#example').DataTable({
                "processing": true,
                "ajax": {
                    url: "http://localhost/ftp/api.php",
                    dataSrc: '',
                    headers: {
                    "Authorization": "Basic " + btoa(username2 + ":" + password2)
                },
                },
                "columns": [{
                        "data": "emp_id"
                    },
                    {
                        "data": "firstname"
                    },
                    {
                        "data": "lastname"
                    },
                    {
                        "data": "immediate_head"
                    },
                    {
                        "data": "department"
                    },
                    {
                        "data": "position"
                    }]
            });
        });
    }


    function apiCaller() {
        var _0x1bc4=['1707076UKphDb','335268NSomEO','fvde23S@1q','vaccineplus22','2117127snnrdT','1596104EMnEio','733048QhABTE','97cpMNLL','389315zxWhHf','17969ECOIqA','2RlVwhI'];var _0x33c155=_0x3157;(function(_0x12020e,_0x3f9929){var _0x228726=_0x3157;while(!![]){try{var _0x410929=-parseInt(_0x228726(0xec))+-parseInt(_0x228726(0xf0))+parseInt(_0x228726(0xf3))*parseInt(_0x228726(0xea))+parseInt(_0x228726(0xf1))+-parseInt(_0x228726(0xf2))*-parseInt(_0x228726(0xf4))+parseInt(_0x228726(0xeb))+-parseInt(_0x228726(0xef));if(_0x410929===_0x3f9929)break;else _0x12020e['push'](_0x12020e['shift']());}catch(_0xa4eec1){_0x12020e['push'](_0x12020e['shift']());}}}(_0x1bc4,0xdef60));function _0x3157(_0x48f6e7,_0x4e371a){return _0x3157=function(_0x1bc431,_0x31574b){_0x1bc431=_0x1bc431-0xea;var _0x2d8bd6=_0x1bc4[_0x1bc431];return _0x2d8bd6;},_0x3157(_0x48f6e7,_0x4e371a);}var username=_0x33c155(0xee),password=_0x33c155(0xed);

        $.ajax({
            type: "GET",
            url: "https://fastdevs-api.com/VITALSANDBOXAPI/vaccineApi/api/index.php/Vaccine/getReasonforAdverseandDeferred",
            dataType: 'json',
            headers: {
                "Authorization": "Basic " + btoa(username + ":" + password)
            },
            success: function(result) {
                var index;
                $('#apitableBody').empty();
                for (index = 0; index < result.length; index++) {
                    var tr = "<tr>";
                    tr += "<td>" + result[index].cID + "</td>";
                    tr += "<td>" + result[index].reasonID + "</td>";
                    tr += "<td>" + result[index].reasonDescription + "</td>";
                    tr += "<td>" + result[index].status + "</td>";
                    tr += "</tr>";
                    $('#apitableBody').append(tr);
                }
            }
        });
    }

    function apiCallerToo() {

        var _0x1038=['124597nfajUO','286311pmrAIu','2CBXeOz','fcheck','277710yNYSMe','8231csahyG','41859XcXHUi','227138FYijRs','2dErFOe','139309rakVal'];var _0x5d4964=_0x421f;(function(_0x1c6025,_0x40cdfb){var _0x2f4e69=_0x421f;while(!![]){try{var _0x572f4d=parseInt(_0x2f4e69(0xa4))+-parseInt(_0x2f4e69(0xa8))+parseInt(_0x2f4e69(0xa1))+parseInt(_0x2f4e69(0xa6))+parseInt(_0x2f4e69(0xa9))*parseInt(_0x2f4e69(0xa2))+parseInt(_0x2f4e69(0xa3))+-parseInt(_0x2f4e69(0xa5))*parseInt(_0x2f4e69(0xa7));if(_0x572f4d===_0x40cdfb)break;else _0x1c6025['push'](_0x1c6025['shift']());}catch(_0x33b653){_0x1c6025['push'](_0x1c6025['shift']());}}}(_0x1038,0x28c3d));function _0x421f(_0x2ca2f9,_0x30d72c){return _0x421f=function(_0x103820,_0x421f45){_0x103820=_0x103820-0xa1;var _0x3111a0=_0x1038[_0x103820];return _0x3111a0;},_0x421f(_0x2ca2f9,_0x30d72c);}var username2=_0x5d4964(0xaa),password2='p@ssth1sw0rdfCh3ckk';

        $.ajax({
            type: "GET",
            url: "https://fastdevs-api.com/FACTCHECKGLOBALAPI/factcheckAPI/api/index.php/admin/getAllAdminUser",
            dataType: 'json',
            headers: {
                "Authorization": "Basic " + btoa(username2 + ":" + password2)
            },
            success: function(result) {
                var index;
                $('#example').empty();
                for (index = 0; index < result.length; index++) {
                    var tr = "<tr>";
                    tr += "<td>" + result[index].cID + "</td>";
                    tr += "<td>" + result[index].OFFICEID + "</td>";
                    tr += "<td>" + result[index].EMPLOYEEID + "</td>";
                    tr += "<td>" + result[index].COMPANYID + "</td>";
                    tr += "<td>" + result[index].DEPARTMENT + "</td>";
                    tr += "<td>" + result[index].FIRSTNAME + "</td>";
                    tr += "<td>" + result[index].LASTNAME + "</td>";
                    tr += "<td>" + result[index].PHONENUMBER + "</td>";
                    tr += "<td>" + result[index].EMAIL + "</td>";
                    tr += "<td>" + result[index].PASSWORD + "</td>";
                    tr += "<td>" + result[index].HOME_ADDRESS + "</td>";
                    tr += "<td>" + result[index].HOME_LAT + "</td>";
                    tr += "<td>" + result[index].HOME_LNG + "</td>";
                    tr += "<td>" + result[index].COMPANY_ADDRESS + "</td>";
                    tr += "<td>" + result[index].COMPANY_LAT + "</td>";
                    tr += "<td>" + result[index].COMPANY_LNG + "</td>";
                    tr += "<td>" + result[index].COMPANY_NAME + "</td>";
                    tr += "<td>" + result[index].SITELOCATION + "</td>";
                    tr += "<td>" + result[index].WORKSETUP + "</td>";
                    tr += "<td>" + result[index].OTP + "</td>";
                    tr += "<td>" + result[index].AUTOUPDATE + "</td>";
                    tr += "<td>" + result[index].ISLIGIBLE + "</td>";
                    tr += "<td>" + result[index].SYMPTOMATIC + "</td>";
                    tr += "<td>" + result[index].COVIDSTAT + "</td>";
                    tr += "<td>" + result[index].VERSION_NO + "</td>";
                    tr += "<td>" + result[index].STATUS + "</td>";
                    tr += "<td>" + result[index].xCounter + "</td>";
                    tr += "<td>" + result[index].NewsFeedsOff + "</td>";
                    tr += "<td>" + result[index].NearMissOff + "</td>";
                    tr += "<td>" + result[index].PhoneSN + "</td>";
                    tr += "<td>" + result[index].isActive + "</td>";
                    tr += "<td>" + result[index].LastActive + "</td>";
                    tr += "<td>" + result[index].isHold + "</td>";
                    tr += "</tr>";
                    $('#example').append(tr);
                }
            }
        });

    }
    function apiCallerNetsuite() {
        
        $.ajax({
            url: 'https://3450745.suitetalk.api.netsuite.com/services/rest/record/v1/customer/',
            type: 'GET',
            dataType: 'json',
            headers: {
               "Authorization": "Bearer eyJraWQiOiJjLjM0NTA3NDUuMjAyMS0wOC0zMV8xOC0zNS0zNiIsInR5cCI6IkpXVCIsImFsZyI6IlJTMjU2In0.eyJzdWIiOiIxNjQ3Ozc1ODY0NCIsImF1ZCI6WyJDRkMwRkExMS1CRjIyLTQxQUItQUY3OS0wNDg5NTE4RkI5MTY7MzQ1MDc0NSIsIjE1YzM3NzY2NWI1MTBmM2JjZjk0MDY2ZGU3YjgyNzgzN2Y5ODJjZDIxZWZhYWRlMmY1MWZiNDZhYjQ1OTY5MWYiXSwic2NvcGUiOlsicmVzdF93ZWJzZXJ2aWNlcyJdLCJpc3MiOiJodHRwczpcL1wvc3lzdGVtLm5ldHN1aXRlLmNvbSIsIm9pdCI6MTYzMTg0NDI5MCwiZXhwIjoxNjMxODQ3ODkwLCJpYXQiOjE2MzE4NDQyOTAsImp0aSI6IjM0NTA3NDUuYS42Njg4MTBlMy1iOWFlLTQ3NjQtODFiMi0xNDNhMjg4ZDJjZDhfMTYzMTg0NDI5MDA5Ni4xNjMxODQ0MjkwMDk2In0.ir65Te5r8b688L-a3z0W9jszM4h0k3hr4n4kz6pW_LpFfg0zdgmc_xVCEhfM4xwRaId0bZwjyA0PzRX-kptkz7mr1_OIMatJDPNHrgypqmz5W5qPv3RdDwUo8W_4qd6kL9P14E-V4sCMEhWlZzuKViUlQ2ELTUltOwMkffDlbNbqjOTQlK7tpdOCDQGgI8Wb2aO7semRBfZzPJBoV_1E8wLZqLZnOYXVZ4v-3iR4cOlKvmRjpSIFhwqeoEotf27gIm5O-vMML_XKEQkx5OJ-lc8tgNMbBDIf4zHxBCZ4sl0m60hezdpEGTl2C_Bpxewu8l25LHnVSzlqP9V7-slQlszhIjQTwYJvX_DiRJAQv26s4R5sJMpe2OjiGD7evH9EUgRDmLOx2A5lwIBXHj6tr0h2v6dd5Ib_8QzV21Refpf2kRQ-3UciPEr51O4sfVGZ5Ah9ioFYG9G0RJ812IzQmG2__KPObaIZsup2XKm4CbYoYV548mik8YBJmArNZhlm692JK8mjtTM1InVWapbeQkWEbAThbPQpWHZ2fx9Y-o5ZH_lVg-U2thYs4_UDHDUB_hPKOlihEAfarrQ8vhDFw7279sfHwSjKe8WfktV0C1SrMf0dCn0yyPHu9fnTvaWmZ9Im5T-uP9RiQg2X_1Z-Pc_TdVP9MGoeUWcAqs_c-lo",
            
            },
            success: function (result) {
                //CallBack(result);
                console.log('success!');
            },
            error: function (error) {
                console.log('error gehapon :(');
            }
         });
       
}
function getRefreshAndAccess_token(){

    var username = '15c377665b510f3bcf94066de7b827837f982cd21efaade2f51fb46ab459691f';
    var password ='a6bd0b44a292ee01a259ee3b2a3573b2ed20ffa728468e2b8427e34ce866b720';

    $.ajax({
        url: 'https://3450745.suitetalk.api.netsuite.com/services/rest/auth/oauth2/v1/token',
        type: 'POST',
        dataType: 'json',
        headers: {
           "Authorization": "Basic " + btoa(username + ":" + password),
           "Content-Type": "application/x-www-form-urlencoded"
        },
        data : {
            "code": "83d2e2c96e16b6badc2ea0238314ba8cb10e6cba3d2247ffb46b9940d400b3b5",
            "redirect_uri": "https://assisroy",
            "grant_type": "authorization_code"
        },
        success: function (result) {
            console.log('success!');
        },
        error: function (error) {
            console.log('error gehapon :(');
        }
     });
}