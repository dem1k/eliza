/*
	various functions for basket, shop informers, etc
*/

function str_repeat(i, m) {
	for (var o = []; m > 0; o[--m] = i);
	return o.join('');
}

function sprintf() {
	var i = 0, a, f = arguments[i++], o = [], m, p, c, x, s = '';
	while (f) {
		if (m = /^[^\x25]+/.exec(f)) {
			o.push(m[0]);
		}
		else if (m = /^\x25{2}/.exec(f)) {
			o.push('%');
		}
		else if (m = /^\x25(?:(\d+)\$)?(\+)?(0|'[^$])?(-)?(\d+)?(?:\.(\d+))?([b-fosuxX])/.exec(f)) {
			if (((a = arguments[m[1] || i++]) == null) || (a == undefined)) {
				throw('Too few arguments.');
			}
			if (/[^s]/.test(m[7]) && (typeof(a) != 'number')) {
				throw('Expecting number but found ' + typeof(a));
			}
			switch (m[7]) {
				case 'b': a = a.toString(2); break;
				case 'c': a = String.fromCharCode(a); break;
				case 'd': a = parseInt(a); break;
				case 'e': a = m[6] ? a.toExponential(m[6]) : a.toExponential(); break;
				case 'f': a = m[6] ? parseFloat(a).toFixed(m[6]) : parseFloat(a); break;
				case 'o': a = a.toString(8); break;
				case 's': a = ((a = String(a)) && m[6] ? a.substring(0, m[6]) : a); break;
				case 'u': a = Math.abs(a); break;
				case 'x': a = a.toString(16); break;
				case 'X': a = a.toString(16).toUpperCase(); break;
			}
			a = (/[def]/.test(m[7]) && m[2] && a >= 0 ? '+'+ a : a);
			c = m[3] ? m[3] == '0' ? '0' : m[3].charAt(1) : ' ';
			x = m[5] - String(a).length - s.length;
			p = m[5] ? str_repeat(c, x) : '';
			o.push(s + (m[4] ? a + p : p + a));
		}
		else {
			throw('Huh ?!');
		}
		f = f.substring(m[0].length);
	}
	return o.join('');
}

function getCookie(c_name){
	var i,x,y,ARRcookies=document.cookie.split(";");
	for (i=0;i<ARRcookies.length;i++){
		x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
		y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
		x=x.replace(/^\s+|\s+$/g,"");
		if (x==c_name){
			return unescape(y);
		}
	}
}

function formatPrice(price, currObj){
	var data = price*currObj.rate;
	var znak = '';
	if(data<0){
		data*=-1;
		znak = '-';
	}
	data = sprintf(uCoz.shop_price_f[0], data);
	if(uCoz.shop_price_f[1] != ''){
		data = data.replace('.', uCoz.shop_price_f[1]);
	}
	return currObj.dpos ? znak+""+currObj.disp+""+data : znak+""+data+""+currObj.disp;
}

function optChangePrice(obj, event){
	var id = $(obj).attr('id').split('-')[1];
	var pref = $(obj).attr('id').split('-')[0];
	if(obj.nodeName=='INPUT'){
		pref = pref.replace(/^q/, '');
	}
	if(uCoz==undefined || uCoz.sh_goods[id] == undefined) return;
	var pos = undefined;
	var sum = 0;
	$.each($("[id^="+pref+"-"+id+"-oval-]"), function(){
		if(this.tagName == 'INPUT' && this.checked)
			sum+=parseFloat($(this).attr('class').match(/mar(\d+)/)[1]);
		if(this.tagName == 'SELECT'){
			sum+=parseFloat($(this).children(":selected").attr('class'));
			var match = $(this).attr('class').match(/pos(\d+)/);
			if(match && (parseInt(match[1])<pos || pos == undefined)) pos = parseInt(match[1]);
		}
	});
	if($(obj).hasClass("pos"+pos) && uCoz.sh_goods[id].imgs != undefined && uCoz.sh_goods[id].imgs.length>1 && uCoz.sh_goods[id].imgs[obj.options.selectedIndex] != undefined){
		// var selector = pref != 'id' ? 'ipreview' : pref+'-gphoto-'+id;
		var selector = pref+'-gphoto-'+id;
		if(pref == 'id' && $('img#ipreview').length) selector='ipreview';
		$('img#'+selector).attr('src', uCoz.sh_goods[id].imgs[obj.options.selectedIndex]).attr('idx', obj.options.selectedIndex);
	}
	var cnt = $('#q'+pref+'-'+id+'-basket').val();
	if(cnt=='' || cnt==undefined) cnt=1;
	var curr = getCookie(uCoz.mf+'uShopCu') ? getCookie(uCoz.mf+'uShopCu') : uCoz.sh_curr_def;
	var price = formatPrice((sum+parseFloat(uCoz.sh_goods[id].price))*cnt, uCoz.sh_curr[curr]);
	$("."+pref+"-good-"+id+"-price").html(price);
	if(uCoz.sh_goods[id].old_price != '0.00') $("."+pref+"-good-"+id+"-oldprice").html(formatPrice((sum+parseFloat(uCoz.sh_goods[id].old_price)*cnt), uCoz.sh_curr[curr]));
}

function checkNumber(obj, event, changePrice) {
	event = (event)?event:window.event;
	var code = (event.charCode) ? event.charCode : event.keyCode;
	var el = event.target || event.srcElement;
	if((code >=48 && code <=57) || (code == 37 ) || (code == 45) || (code==8) || (code==46)){
		if(parseInt(changePrice)) setTimeout(function(){optChangePrice(obj)}, 100);
		return true;
	}else{
		return false
	}
}

function wishlist(obj) {
	if(lock_buttons) return false; else lock_buttons = 1;
	var id = null;
	id = obj.id.split('-')[1];
	$(obj).removeClass().addClass('wish').addClass('wait');
	_uPostForm('',{type:'POST',url:'/shop/wishlisth',data:{'goods_id':id}});
	return false;
}