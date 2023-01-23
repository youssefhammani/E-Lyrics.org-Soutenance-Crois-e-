<?php

class DataController {
    public static function saveData()
    {
    //     if (isset($_POST['Save-model']))
    //     {
    //    $data = array(
    //     'Singer' => $_POST['Singer'],
    //     'Song' => $_POST['Song'],
    //     'Album' => $_POST['Album'],
    //     'Lyric' => $_POST['Lyric']
    //    );

    //    $result = MusicInfo::insertMusic($data);

    //    if ($result)
    //    {
    //         header('location: dashboard.php');
    //    }
    // }


        $singer = $_POST['Singer'];
        $song   = $_POST['Song'];
        $album  = $_POST['Album'];
        $lyric  = $_POST['Lyric'];
        $date   = $_POST['Date'];

       MusicInfo::insertMusic($singer, $song, $album, $lyric, $date);
       echo "<script>window.location.href ='dashboard.php'</script>";
    }

    public static function editData()
    {   
        $id     = $_POST['edit-id'];
        $singer = $_POST['Editsinger'];
        $song   = $_POST['Editsong'];
        $album  = $_POST['Editalbum'];
        $lyric  = $_POST['Editlyric'];
        $date   = $_POST['Editdate'];

        // die(print_r($_POST));
        $result = MusicInfo::editInsertMusic($id, $singer, $song, $album, $lyric, $date);

        if ($result)
        {
            header('location: dashboard.php');
        }
    
    }

    public static function checkDelete()
    {
        $id = $_POST['idd4'];

        $result = MusicInfo::deleteMusic($id);

        if ($result)
        {
            header('location: dashboard.php');
        }

    }

    public static function getData()
    {
        $singername = $_POST['username'];

        MusicInfo::insertSinger($singername);
    }

    public static function addAlbum()
    {
        $album_name = $_POST['aalbum'];

        MusicInfo::insertAlbum($album_name);
    }

}

