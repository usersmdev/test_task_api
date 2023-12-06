
let favorite = document.querySelectorAll('.favorite')
function removePreloader() {
    // select the preloader element
    var preloader = document.querySelector('#preloader');
    // if it exists, remove it from the page
    if(preloader) {
        preloader.remove();
    }
}
        function sendForm(e) {
        let elCategoryID = e.target.dataset.category;
        let elPostID = e.target.dataset.post;
        let elResult = e.target.parentElement.querySelector('.result-wrapper');

        const postid = encodeURIComponent(elPostID);
        const categoryid = encodeURIComponent(elCategoryID);
        const formData = 'postid=' + postid + '&categoryid=' + categoryid;
        const xhr = new XMLHttpRequest();
            // xhr.onreadystatechange = function() {
            //     if(xhr.readyState == 4 && xhr.status == 200) {
            //         removePreloader();
            //     } else {
            //         addPreloader()
            //     }
            // };
        xhr.open('POST', '../../ajax/addFavorit.php');
        xhr.responseType = 'json';
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = () => {
            if (xhr.status !== 200) {
                return;
            }
            const response = xhr.response;
            if(response.result){
                e.target.remove();
                elResult.innerHTML = `<div>В избранном (${response.result})</div>`;

            }

        }
        xhr.send(formData);

        elResult.textContent = '...';
        }
for (var i = 0; i < favorite.length; i++) {
    let result = favorite[i].querySelector('.result-wrapper');
    favorite[i].querySelector('a').addEventListener("click", (e) => {
        e.preventDefault();
        let preloaderHTML = 'Загрузка ...';
        e.target.parentElement.querySelector('#preloader').innerHTML += preloaderHTML;

        setTimeout(function() {
            sendForm(e)
            e.target.parentElement.querySelector('#preloader').innerHTML = '';
        }, Math.floor(Math.random()*(5000-1000)+1000));
    });
}