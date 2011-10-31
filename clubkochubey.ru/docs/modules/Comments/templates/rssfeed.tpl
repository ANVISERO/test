<?xml version="1.0"?>
<rss version="2.0">
	<channel>
		<title>{$sitename|escape}</title>
		<link>{$root_url}</link>
		<description>Current Comments entries</description>
		{foreach from=$items item=entry}
		<item>
			<title><![CDATA[{$entry->title}]]></title>
			<link>{$entry->link}</link>
			<guid>{$entry->link}</guid>
			<pubDate>{$entry->gmdate}</pubDate>
			<description><![CDATA[{eval var=$entry->strippedsummary}
			{eval var=$entry->strippedcontent}]]></description>
		</item>
		{/foreach}
	</channel>
</rss> 
