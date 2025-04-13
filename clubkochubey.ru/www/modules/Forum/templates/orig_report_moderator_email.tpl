The following post {if isset($data.topic_content)}in "{$data.topic_content}" topic {/if}{if isset($data.poster_name)}by {$data.poster_name} {/if} has been reported {if isset($data.user_name)}by {$data.user_name}{/if} on {$data.forum_name} forum you moderate:

{$data.post_url}

The reporter has made the following comment:
{if isset($data.post_comment)}{$data.post_comment}{/if}


Regards,
The ForumMadeSimple Team