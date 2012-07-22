<?php
$user_name = 'lennon_22';
$secret_key = 'BJz2LYhjOB4grzD8fhrt49rviSW3yvKTs';
$search_phrase = 'beatles love';
$query_hash = md5($secret_key.$search_phrase);
$xml_request_url = 'http://www.allcdcovers.com/api/search/'.$user_name.'/'.$query_hash.'/'.urlencode($search_phrase);
$xml = new SimpleXMLElement($xml_request_url, null, true);
if (isset($xml->err)) {
  echo $xml->err['msg'];
} else {
  foreach ($xml as $title) {
    echo 'Title: '.$title->name;
    echo 'Category: '.$title->category.': '.$title->subcategory;
    echo 'Image: '.$title->image;
    echo 'Image: '.$title->image;
    foreach ($title->covers->cover as $cover) {
      echo 'Cover type:'.$cover->type;
      echo 'Resolution:'.$cover->width.' '.$cover->height;
      echo 'Filesize:'.$cover->filesize;
      echo 'Upload date:'.$cover->uploaded_at;
      echo 'Average rating:'.$cover->average_rating;
      echo 'Download page:'.$cover->url;
      echo 'Thumbnail:'.$cover->thumbnail;
    }
  }
}
?>