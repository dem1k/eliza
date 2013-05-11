<?=form_open('/admin/seo')?>

<table >
    <tr>
        <td>
            Title
        </td>
        <td><?=form_error('title')?>
            <input type="text" name="title" value="<?=set_value('title',$seo->title)?>" />
        </td>
    </tr>
    <tr>
        <td>
            Keywords
        </td>
        <td>
            <?=form_error('keywords')?>
            <textarea cols="50" name="keywords"> <?=set_value('keywords',$seo->keywords)?> </textarea>
    </tr>
    <tr>
        <td>
            Description:
        </td>
        <td>
            <?=form_error('description')?>
            <textarea cols="50" name="description"><?=set_value('description',$seo->description)?> </textarea>
        </td>
    </tr>
    <tr>
        <td>
            sitename:
        </td>
        <td>
            <?=form_error('sitename')?>
            <textarea cols="50" name="sitename"><?=set_value('sitename',$seo->sitename)?> </textarea>
        </td>
    </tr>
    <tr>
        <td>
            phone:
        </td>
        <td>
            <?=form_error('phone')?>
            <textarea cols="50" name="phone"><?=set_value('phone',$seo->phone)?> </textarea>
        </td>
    </tr><tr>
    <td>
        address:
    </td>
    <td>
        <?=form_error('address')?>
        <textarea cols="50" name="address"><?=set_value('address',$seo->address)?> </textarea>
    </td>
</tr>
    <tr>
        <td>
            facebook:
        </td>
        <td>
            <?=form_error('facebook')?>
            <textarea cols="50" name="facebook"><?=set_value('facebook',$seo->facebook)?> </textarea>
        </td>
    </tr>
    <tr>
        <td>
            vk:
        </td>
        <td>
            <?=form_error('vk')?>
            <textarea cols="50" name="vk"><?=set_value('vk',$seo->vk)?> </textarea>
        </td>
    </tr>
    <tr>
        <td>
            twitter:
        </td>
        <td>
            <?=form_error('vk')?>
            <textarea cols="50" name="vk"><?=set_value('vk',$seo->vk)?> </textarea>
        </td>
    </tr>
    <tr>
        <td>
            copyrights:
        </td>
        <td>
            <?=form_error('copy')?>
            <textarea cols="50" name="copy"><?=set_value('copy',$seo->copy)?> </textarea>
        </td>
    </tr>
    
</table>
<input type="hidden" name="action" value="save">
<input type="submit" value="Save" />
</form>