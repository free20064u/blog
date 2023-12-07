
const mobile_list = document.querySelector('.mobile_toggle');


mobile_list.addEventListener('click', toggle); 

function toggle(){
    const mobile_list_1 = document.querySelector('.mobile-list-1');
    const mobile_list_2 = document.querySelector('.mobile-list-2');
    const menu = document.querySelector('.menu');
    const navbar_mobile = document.querySelectorAll('.navbar_mobile')

    if(mobile_list_1.getAttribute('style') == 'display:none'){ 
        mobile_list_1.setAttribute('style','display:block');
        mobile_list_2.setAttribute('style', 'display:none');
        menu.setAttribute('style','display:none')
        navbar_mobile[0].setAttribute('style', 'display:none');
        navbar_mobile[1].setAttribute('style', 'display:none')
    }
    else{
        mobile_list_1.setAttribute('style','display:none');
        mobile_list_2.setAttribute('style', 'display:block');
        menu.setAttribute('style','display:block');
        navbar_mobile[0].setAttribute('style', 'display:block');
        navbar_mobile[1].setAttribute('style', 'display:block')
    }
}
