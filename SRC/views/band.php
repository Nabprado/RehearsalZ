<div class="main_content band">
    <button class="add_song"><a href="/?page=add_song&band_id=<?=$_GET['id']?>">Add song</a></button>

    <?php foreach($songs as $song):?>
        <article class="main_content_article song">

            <h2> <a href="/?page=song&id=<?=$song->id?>"><?=$song->name?></a></h2>
            
        </article>
    <?php endforeach; ?>

</div>