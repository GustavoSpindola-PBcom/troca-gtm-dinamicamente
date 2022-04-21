/* Método responsável por puxar os dados do cookie */
/* Origem do código: https://www.w3schools.com/js/js_cookies.asp */
function getCookie(cname) {
    let name = cname + "=";
    let ca = decodeURIComponent(document.cookie).split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
/* Método responsável por setar os valores do cookie */
/* Origem do código: https://www.w3schools.com/js/js_cookies.asp */
function setCookie(cname, cvalue, exdays) {
    let d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
/* Método responsável por deletar o cookie */
/* Origem do código: https://mariovalney.com/como-usar-cookies-com-javascript/ */
function deleteCookie(name) {
    if (getCookie(name)) {
        document.cookie = name + "=" + "; expires=Thu, 01-Jan-70 00:00:01 GMT";
    }
}
/* Método responsável por pegar os dados da URL e transforma-los em objetos JS */
function queryObj(query) {
    var result = {},
        keyValuePairs = query.split("&");
    keyValuePairs.forEach(function (keyValuePair) {
        keyValuePair = keyValuePair.split('=');
        result[decodeURIComponent(keyValuePair[0])] = decodeURIComponent(keyValuePair[1]) || '';
    });
    return result;
}

/* Pegando a URL da página atual */
let url_atual = window.location.href;

/* Verificando se a URL possui ? ou &, pois isso indica que há algum parâmetro na URL */
if (url_atual.indexOf('?') > -1 || url_atual.indexOf('&') > -1) {
    /* Transformando os parâmetros da URL em objetos JS */
    let traqueioSeparado = queryObj(location.search.slice(1));
    /* Variável responsável por armazenar a string que será inserida no cookie */
    let traqueioCookie = "";
    /* Verificando se os UTM estão sem valor. Se eles estiverem, o cookie deve ser criado */
    if (traqueioSeparado.utm_campaign != undefined && traqueioSeparado.utm_source != undefined && traqueioSeparado.utm_medium != undefined) {
        traqueioCookie += "utm_source=" + traqueioSeparado.utm_source + "&utm_medium=" + traqueioSeparado.utm_medium + "&utm_campaign=" + traqueioSeparado.utm_campaign;
        /* Verificando se o cmp possui valor */
        if (traqueioSeparado.cmp != null) {
            traqueioCookie += "&cmp=" + traqueioSeparado.cmp;
        }
        /* Verificando se o cmp possui valor */
        if (traqueioSeparado.empresa != null) {
            traqueioCookie += "&empresa=" + traqueioSeparado.empresa;
        }
        /* Verificando se o cookie existe */
        if (document.cookie.indexOf('traqueioTP') >= 0) {
            deleteCookie('traqueioTP');
        }
        /* Armazenando os valores no cookie */
        setCookie('traqueioTP', traqueioCookie, 2);
    }
}