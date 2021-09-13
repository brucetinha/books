(function (win, doc) {
    'use strict';

    function confirmDel(event) {
        event.preventDefault();
        let token = doc.getElementsByName('_token')[0].value;

        if(confirm("Deseja realmente apagar esse dado?")) {
            let ajax = new XMLHttpRequest();
            ajax.open('DELETE', event.target.parentNode.href);
            ajax.setRequestHeader("X-CSRF-TOKEN", token);
            ajax.onreadystatechange = function() {
                if(ajax.readyState === 4 && ajax.status === 200) {
                    win.location.href = "books";
                }
            }
            ajax.send();
        } else {
            return false;
        }
    }

    if(doc.querySelector('.delete-button')) {
        let btn = doc.querySelectorAll('.delete-button');
        for(let i=0; i<btn.length; i++) {
            btn[i].addEventListener('click', confirmDel, false);
        }
    }

})(window, document);