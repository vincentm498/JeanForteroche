function changeLink() {
    var r = confirm("Souhaitez-vous vraiment supprimer l'article");
    if (r == true) {
        document.getElementById("supprimer").removeAttribute("href");
        document.getElementById("supprimer").setAttribute("href", "index.php?action=DeleteArticles&amp;id=<?= $article['id'] ?>");
    }
}