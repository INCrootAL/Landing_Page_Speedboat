window.addEventListener('load',  event => allScriptEvent());

function allScriptEvent() {

    $(document).on('change', '#item-quantity-day-dop-input', function() {
        let input = document.querySelectorAll("#item-quantity-day-dop-input");
        for (let y = 0; y < input.length;y++) {
            $("#svg_"+input[y].dataset["inputquanti"]).attr("data-querDop",input[y].value);
        }
    });

    //edit sum, so start date
    $(document).on('change', '.only_value', function() {
        let filter = document.querySelectorAll(".item_ .cart_about");
        for (let t = 0; t < filter.length; t++) {
            var date = document.querySelectorAll(".item_"+t+" .item-time-race input");
            var date2 = document.querySelectorAll(".item_"+t+" .item-time-race input");
            for (let i = 0; i < date.length - 1; i++) {
                const [day, month, year] = date[i].value.split('.');
                const _date = new Date(+year, +month - 1, +day);
                for (let f = 1; f < date.length; f++) {
                    const [day, month, year] = date2[f].value.split('.');
                    const _date2 = new Date(+year, +month - 1, +day);
                    let newDate = (new Date (_date2) - new Date (_date)) / (60 * 60 *24 * 1000);
                    if (newDate > 0) {
                        document.querySelector(".cart_about.item_"+t).setAttribute("data-query",newDate+=1);
                    } else if (newDate == 0) { 
                        document.querySelector(".cart_about.item_"+t).setAttribute("data-query",newDate);
                    } else {
                        document.querySelector(".cart_about.item_"+t).setAttribute("data-query", "9999");
                    }
                }
            }
        }
        var arraySumm = [];
        var arrayPrePay = [];
        for (let t = 0; t < filter.length; t++) {
            let query = document.querySelector(".cart_about.item_"+t);
            let price = Number(document.querySelector(".price_tour_"+t).innerHTML.replace(" ",""));
            let prepay = Number(document.querySelector(".prepayer_tour_"+t).innerHTML.replace(" ",""));
            var allsum = 0;
            var allprepay = 0;
            if (query.dataset["query"] == 0) { 
                allsum = parseFloat(price) * 1;
                allprepay = parseFloat(prepay) * 1;
            } else if (query.dataset["query"] == 9999) {

            } else {
                allsum = parseFloat(price) * query.dataset["query"];
                allprepay = parseFloat(prepay) * query.dataset["query"];
            }
            arraySumm.push(allsum);
            arrayPrePay.push(allprepay);
            
        }
        var resultSumm = 0;
        var resultPrePay = 0;
        for (var i = 0; i < arraySumm.length; i++) {
            resultSumm += arraySumm[i];
            resultPrePay += arrayPrePay[i];
        }

        let dopPrise = document.querySelectorAll('[data-mess="yep"]');

        //The adding up sum tour and additionally services
        if (dopPrise) {
            if (dopPrise.length == 1) {
                for (let j = 0; j < dopPrise.length; j++) {
                    var _dopPrise = dopPrise[j].getAttribute("data-pri");
                }
                document.querySelector(".final-summ").innerHTML = Number(resultSumm) + Number(_dopPrise);
                const obj2 = document.getElementById("animation-number-summ");
                animateValue(obj2, 0, Number(resultSumm) + Number(_dopPrise), 1000);
            } else {
                let resultSummDopPrice = 0;
                for (let j = 0; j < dopPrise.length; j++) {
                    resultSummDopPrice += Number(dopPrise[j].getAttribute("data-pri"));
                }
                document.querySelector(".final-summ").innerHTML = Number(resultSumm) + Number(resultSummDopPrice);
                const obj2 = document.getElementById("animation-number-summ");
                animateValue(obj2, 0, Number(resultSumm) + Number(resultSummDopPrice), 1000);
            }
        } else {
            document.querySelector(".final-summ").innerHTML = resultSumm;
            const obj2 = document.getElementById("animation-number-summ");
            animateValue(obj2, 0, resultSumm, 1000);
        }

       
        document.querySelector(".final-prepay").innerHTML = resultPrePay;

        const obj = document.getElementById("animation-number-pre");
        animateValue(obj, 0, resultPrePay, 1000);

       
    });
    
    document.querySelector('.dialog_button-container .button').onclick = function() {
        //set summ input for form
        let forInputSumm = document.querySelector(".final-summ").innerHTML;
        document.querySelector('input[name="TOTAL_AMOUNT_CALLBACK"]').value = forInputSumm;

        //set prepay input for form
        let forInputPrePay = document.querySelector(".final-prepay").innerHTML;
        document.querySelector('input[name="TOTAL_AMOUN_PREPAY_CALLBACK"]').value = forInputPrePay;

        //set tour input for form
        let forInputTour = document.querySelectorAll('#input_name_tour');
        for(let d = 0; d < forInputTour.length; d++) {
            let _forInputTour = forInputTour[d].value;
            let date = document.querySelectorAll(".item_"+d+" .item-time-race input");
            for (let v = 0; v < date.length - 1; v++) {
                for (let g = 1; g < date.length; g++) {
                    _forInputTour = forInputTour[d].value +"(c " + date[v].value + " по " + date[g].value + ")";
                    forInputTour[d].value = _forInputTour;
                }
            }
        }

        //set services input for form
        let dopPrise = $('[data-mess="yep"]');
        let inputDopPrise = document.querySelector("#input_name__dop_tour");
        if (dopPrise) {
            if (dopPrise.length == 1) {
                    inputDopPrise.value = dopPrise.attr("data-newName");
            } else {
                var _dopPrise = new Array();
                $('[data-mess="yep"]').each(function (index, oneOption) {
                    _dopPrise.push($(oneOption).attr("data-newName"));   
                });
                inputDopPrise.value = _dopPrise.join();
            }
        }

        let gg = valDop();

        if (gg != 0) {
            event.preventDefault();
        }
    }
}

// Performs an addition or decrease for additional services quantity by click plus or minus
function calcPandM(e) {
    if (e.classList.value == "item-quantity-day-dop plus yes") {
        let seach = e.getAttribute("data-plus");
        let quantity = document.querySelector('[data-inputquanti="'+seach+'"]');
        let newQuery = Number(quantity.value) + 1;
        quantity.value = newQuery;
        $('#svg_'+seach).attr("data-querDop",quantity.value);
        oneClickPlusAdd(e);
    } else if (e.classList.value == "item-quantity-day-dop minus yes" || e.classList.value == "item-quantity-day-dop minus no") {
        let seach = e.getAttribute("data-minus");
        let quantity = document.querySelector('[data-inputquanti="'+seach+'"]');
        if (Number(quantity.value) > 0) {
            let newQuery = Number(quantity.value) - 1;
            quantity.value = newQuery;
            $('#svg_'+seach).attr("data-querDop",quantity.value);
            oneClickPlusRemove(e)
        }
    } else if (e.classList.value == "item-quantity-day-dop plus no") {
        let seach = e.getAttribute("data-plus");
        let quantity = document.querySelector('[data-inputquanti="'+seach+'"]');
        let newQuery = Number(quantity.value) + 1;
        if (Number(quantity.value) == 0) {
            quantity.value = newQuery;
            $('#svg_'+seach).attr("data-querDop",quantity.value);
            oneClickPlusAdd(e);
        }
    }
}

function valDop() {
    var gt = 0; 
    var dateInput = document.querySelectorAll('.cart_about .item-time-race input');
    for (let q = 0; q < dateInput.length; q++) {
        if (dateInput[q].value == "") {
            gt++;
            dateInput[q].classList.add('error');
        } else {
            dateInput[q].classList.remove('error');
        }
    }
    if (document.querySelector('.dialog__contain input[name="captcha_word"]')) {
        if (document.querySelector('.dialog__contain input[name="captcha_word"]').value == "") { 
            gt+=1;
            document.querySelector('.dialog__contain input[name="captcha_word"]').classList.add('error');
        } else {
            document.querySelector('.dialog__contain input[name="captcha_word"]').classList.remove('error');
        }
    }
    return gt;
}

// Function for removing a tour from the cart
function deletIsBuy(v) {
    var id = v;
    var viwe = "del";
    var formData = new FormData();
    formData.append('id', id);
    formData.append('viwe', viwe);
    var HttpRequest = new XMLHttpRequest();
    HttpRequest.onload = function(e) {
        if (this.status == 200) {
            document.querySelector('.item-adding').innerHTML = this.response;
            let buttonCard = document.querySelector('[data-item="'+id+'"]');
            buttonCard.innerText = "Забронировать";
            buttonCard.setAttribute("onclick", "Buy(this)");
            buttonCard.classList.remove("add-cart-use");
            let enptemptyItems = document.querySelector(".empty-items");
            if (enptemptyItems) {
                document.querySelector("#callback-form").style.display = "none";
				document.querySelector(".not-add-cart").style.display = "block";
            }
        }
    };
    HttpRequest.open("POST", '/bitrix/templates/partner_teal/ajax/card.php', true);
    HttpRequest.send(formData);
};

// Function to animate numbers
function animateValue(obj, start, end, duration) {
    let startTimestamp = null;
    const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        obj.innerHTML = Math.floor(progress * (end - start) + start);
        if (progress < 1) {
        window.requestAnimationFrame(step);
        }
    };
    window.requestAnimationFrame(step);
};

function oneClickPlusAdd(e) {
    var svg = document.getElementById(e.id);
    let dopPrice;
    $(e).attr("data-mess", "yep")
    if ($(e).attr("data-querDop")) {
        if (Number($(e).attr("data-querDop")) == 1) {
            dopPrice = $(e).data("pri");
        } else if (Number($(e).attr("data-querDop")) > 1) {
            dopPrice = Number($(e).data("pri")) * Number($(e).attr("data-querDop"));
            console.log("um: ", dopPrice);
        }
        let inputBlock = $("input[data-inputquanti='"+e.id.substring(4)+"']");
        let nameDop = $(e).attr("data-name");
        let _nameDop = nameDop + "(Кол-во дней: " + $(e).attr("data-querDop") + " Цена: " + $(e).data("pri") + " руб.)";
        $(e).attr("data-newName", _nameDop)
    } else {
        dopPrice = $(e).data("pri");
        let nameDop = $(e).attr("data-name");
        let _nameDop = nameDop + "(Цена: " + $(e).data("pri") + " руб.)";
        $(e).attr("data-newName", _nameDop)
    };
    dopPrice = $(e).data("pri");
    
    //$(e).attr("onclick","oneClickPlusRemove(this)");
    if (document.querySelector(".final-summ").innerHTML == "-") {
        document.querySelector(".final-summ").innerHTML = dopPrice;
        const obj2 = document.getElementById("animation-number-summ");
    } else {
        document.querySelector(".final-summ").innerHTML = Number(document.querySelector(".final-summ").innerHTML) + Number(dopPrice);
    }
    
};

function oneClickPlusRemove(e) {
    let _e = e.id.slice(0, -1)
    var svg = document.getElementById(_e);
    let nameDop = $(svg).attr("data-name");
    let dopPrice;
    //console.log($(svg).attr("data-querdop"));
    //console.log(svg);
    if ($(svg).attr("data-querdop")) {
        if (Number($(svg).attr("data-querdop")) == 1) {
            dopPrice = $(svg).data("pri");
            document.querySelector(".final-summ").innerHTML = Number(document.querySelector(".final-summ").innerHTML) - Number(dopPrice);
            let _nameDop = nameDop + "(Кол-во дней: " + $(svg).attr("data-querDop") + " Цена: " + $(svg).data("pri") + " руб.)";
            $(svg).attr("data-newName", _nameDop)
        } else if (Number($(svg).attr("data-querdop")) > 1) {
            dopPrice = $(svg).data("pri");
            document.querySelector(".final-summ").innerHTML = Number(document.querySelector(".final-summ").innerHTML) - (Number(dopPrice));
            let _nameDop = nameDop + "(Кол-во дней: " + $(svg).attr("data-querDop") + " Цена: " + $(svg).data("pri") + " руб.)";
            $(svg).attr("data-newName", _nameDop)
        } else if (Number($(svg).attr("data-querdop")) < 1){
            dopPrice = $(svg).data("pri");
            document.querySelector(".final-summ").innerHTML = Number(document.querySelector(".final-summ").innerHTML) - (Number(dopPrice));
            let _nameDop = "";
            $(svg).attr("data-newName", _nameDop)
            $(svg).attr("data-mess", "")
        } 
    } else {
        dopPrice = $(svg).data("pri");
        document.querySelector(".final-summ").innerHTML = Number(document.querySelector(".final-summ").innerHTML) - Number(dopPrice);
        let _nameDop = nameDop + "(Кол-во дней: " + $(svg).attr("data-querDop") + " Цена: " + $(svg).data("pri") + " руб.)";
        $(svg).attr("data-newName", _nameDop)

    };
};