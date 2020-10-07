{include 'header.tpl'}
{if $destination eq null}
{include 'adminCategory.tpl'}
{include 'footer.tpl'}
<script src='js/adminCategory.js'></script>
</body>
</html>
{else}
{include 'adminDestination.tpl'}
{include 'footer.tpl'}
<script src="js/adminDestination.js"></script>
</body>
</html>
{/if}

