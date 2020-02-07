<?php $this->title = 'Ajout'; ?>
<h1>Ajouter un Article</h1>
<p><a href="/admin">Retour à la liste des billets</a></p>

<?php if (count($_POST) != 0) : ?>
<div class="alert alert-success" role="alert">
    Votre Article a été modifié !
</div>

<?php endif ?>
<form action="/admin/addpost"  method="post">

    <div class="form-group">
        <label for="author">Auteur</label><br/>
        <input type="text" id="author" name="author" value="" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="author">Titre</label><br/>
        <input type="text" id="title" name="title" value="" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="author">Chapo</label><br/>
        <input type="text" id="chapo" name="chapo" value="" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="comment">Description</label><br/>
        <textarea id="description" name="description" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Ajouter">
    </div>

</form>
