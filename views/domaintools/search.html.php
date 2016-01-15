
<h2>DOMAINTOOLS API EXAMPLE</h2>
<p>
    <small>Examples: <a href="/domaintools/search/DomainTools.com">DomainTools.com</a> |
    <a href="/domaintools/search/DailyChanges.com">DailyChanges.com</a> |
    <a href="/domaintools/search/ReverseWhois.com">ReverseWhois.com</a>
    </small>
</p>

<p>Results for <strong><?=$domain;?></strong></p>

<br />

<h5>Information</h5>
<p>
    Registrant: <?=$domaintools_search->registrant->name;?><br />
    Domains <span class="label label-default"><?=$domaintools_search->registrant->domains;?></span><br />
    SEO Score <span class="label label-default"><?=$domaintools_search->seo->score;?></span><br />
</p>

<br />

<h5>Name Servers</h5>

<table class="table" style="max-width: 500px;">
    <thead class="thead-inverse">
    <tr>
        <th>#</th>
        <th>Server</th>
        <th>More Info</th>
    </tr>
</thead>
<tbody>
    <?php foreach($domaintools_search->name_servers as $index => $name_server) { $index++; ?>
    <tr>
        <th scope="row"><?=$index;?></th>
        <td><?=$name_server->server;?></td>
        <td><a href="<?=$name_server->product_url;?>" target="_blank">view</a></td>
    </tr>
    <?php } ?>
</tbody>
</table>

<h5>Raw Object</h5>
<pre>=<?=var_dump($domaintools_search);?></pre>
