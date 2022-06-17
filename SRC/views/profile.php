<div class="main_content profile">

    <div class="user_profile">
        <img src="/PUBLIC/assets/profile_icon.png" alt="profile icon">
        <p><a href="/?page=user_settings&id=<?=$_SESSION['id']?>"><?=$_SESSION['nickname']?></a></p>
    </div>

    <div class="user_list">
        
        <button class="add_band"><a href="/?page=add_band">Add band</a></button>
        
        <?php foreach($userBands as $band){?>
            
            <article class="band">

                <div class="band_info">
                    <img src="<?=$band->picture?>" alt="band picture">
                    <h2><a href="/?page=band&id=<?=$band->id?>"><?=$band->name?></a></h2>
                </div>
                <div class="band_play">
                    <a href="/?page=band&id=<?=$band->id?>"><input type="button" value="Play now !"/></a>
                </div>

                <form action="" class="edit_bands">
                    <a href="/?page=edit_band&id=<?=$band->id?>">Edit</a>
                </form>

            </article>
                
        <?php } ?>
        
    </div>

</div>
