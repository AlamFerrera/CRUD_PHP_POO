<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="" id="navAnchor">PHP_CRUD_POO</a>
    </div>
</nav>      

<script>
    let url = window.location.pathname;
    let anchor = document.querySelector('#navAnchor');
    let pieces = url.split('/');
    let newUrl = "/" + pieces[1] + "/" + pieces[2]; 

    anchor.addEventListener("click", function(){
        anchor.setAttribute('href', newUrl);
    });
</script>
