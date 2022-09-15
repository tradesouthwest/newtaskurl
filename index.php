<?php 
/**
 * SnippWiki app
 * LICENSE: Apache
 * @author  Larry Judd & Tradesouthwest
 * @link    https://tradesouthwest.com
 */
include 'header.php'; 
?>
<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-sm-12">
        
            <div class="new-login-form">
    <?php $idm = (!isset($_SESSION['login_id'])) ? '' : $_SESSION['login_id']; ?>
            </div>

        
<section class="form-horizontal">
    <?php
    if( isset( $_POST['generate_url'] ) ) 
    {
        // set clean and fill parameters 
        $project_type    = clean_input($_POST['project_type']);
        $project_subject = clean_data($_POST['project_subject']);
        $prefcontractor  = ('' != ($_POST['preferredContractor']) ) ? 
                            '&preferredContractor=' 
                            . clean_input($_POST['preferredContractor']) 
                            : ''; 
        $ref             = ( '' != ($_POST['ref']) ) ?  
                            '&ref=' . (int)($_POST['ref']) : '';
        $exactBudget     = ( '' != ($_POST['exactBudget']) ) ?  
                            '&exactBudget=' . clean_input($_POST['exactBudget'])
                            : '';

        $prefix     = ( '' != ($_POST['prefix']) ) ?  
                       '&prefix=' . clean_input(rawurlencode($_POST['prefix']))
                            : '';

        $affix      = ( '' != ($_POST['affix']) ) ?  
                       '&affix=' . clean_input(rawurlencode($_POST['affix']))
                       : '';
        $title      = ( '' != ($_POST['title'])) ?  
                       '&title=' . clean_input(trim( substr(rawurlencode(
                       $_POST['title']), 
                            0, 120)," " )) : '';
        $descr      = ( '' != ($_POST["descr"]) ) ?   
                       '&desc=' . clean_input(trim( substr(rawurlencode(
                       $_POST["descr"]), 
                            0, 120)," " )) : '';
                           
        $date_in    = (empty( $_POST['date_in'] )) ? date('Y-m-d H:m:i') 
                            : clean_input($_POST['date_in']); 
        
    
        echo '<h4 class="highlight">Success <span>@' . $date_in . '</span></h4>'; 
        //$pattern = '/\s*/m';
        //$rplc    = '';
        
        echo '<aside style="min-height: 120px">
            <p class="highlight">
            https://app.codeable.io/tasks/new?project_type='
            . $project_type . '&project_subject=' . $project_subject 
            . $prefcontractor
            . $ref
            . $exactBudget
            . $prefix
            . $title
            . $affix
            . $descr .'</p>
            </aside>';
        ?> 
        <div class="btn-toolbar">
            <div class="btn-group-inline">
            <a href="index.php" title="return home" class="btn btn-sm btn-secondary">Back Home</a>
            <a href="" title="return home" class="btn btn-sm btn-secondary">HQ</a>
            </div>   
        </div>
    <?php
    }  
    ?>

    </section>

    <article class="table-responsive" style="padding-left: 30px; padding-right: 30px;">
        <p>https://app.codeable.io/tasks/new?<?php if(isset($error)){ echo $_POST['project_type']; } ?></p>
        <form id="viewsnippet" method="POST" action="">

            <tcaption><span class="h4"></span></tcaption>            
            <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>?</th>
                <th>&</th>
                <th>&</th>
                <th>&</th>
                <th>&</th>
            </tr>
            </thead>
            <tbody class="snippet-table-view">
            <tr>
            <td><div class="form-group">
                <label for="project_type">Project Type<em>*</em></label>
                <select name="project_type" id="project_type" 
                    class="form-control input-lg" tabindex="1" required><em>*</em>
                    <option value='customize'>customize</option>
                    <option value='design_and_develop'>design_and_develop</option>
                    <option value='fix'>fix</option>
                    <option value='install'>install</option>
                    <option value='consultation'>consultation</option> 
                </select tabindex="1" required>                  
                </div>
            </td>
            <td><div class="form-group">
                <label for="project_subject">Project Subject<em>*</em></label>
                
                <select name="project_subject" id="project_subject" 
                    class="form-control input-lg" tabindex="1" required>
                    <option value='plugin'>plugin</option>
                    <option value='theme'>theme</option>
                    <option value='site'>site</option>
                    <option value='ecommerce_site'>ecommerce_site</option>
                    <option value='other'>other</option> 
                </select tabindex="1" required>
                </div>&project_subject=ecommerce_site</td>
            <td><div class="form-group">
                <p><label for="preferredContractor">Preferred Contractor Number</label>
                <input type="text" name="preferredContractor" id="preferredContractor" 
                    class="form-control input-lg" placeholder="preferredContractor" 
                    value="" tabindex="1"></p>
                </div>      &preferredContractor=42701</td>
            <td><div class="form-group">
                <p><label for="ref">Referral</label>
                <input type="text" name="ref" id="ref" class="form-control input-lg" 
                    placeholder="ref" 
                    value="" 
                    tabindex="1"></p>
                </div>ref=k8TwB</td>
            <td><div class="form-group">
                <p><label for="exactBudget">Budget Agreed upon</label>
                <input type="text" name="exactBudget" id="exactBudget" class="form-control input-lg" 
                    placeholder="exact budget" 
                    value="" 
                    tabindex="1"></p>
                </div>exactBudget=500</td>
            </tr>
            <tr>
            <td><div class="form-group">
                <p><label for="prefix">Prefix</label>
                <input type="text" name="prefix" id="prefix" class="form-control input-lg" 
                    placeholder="prefix" 
                    value="" 
                    tabindex="1"></p>
                </div>prefix=example prefix</td>
            <td><div class="form-group">
                <p><label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control input-lg" 
                    placeholder="project title" 
                    value="" 
                    tabindex="1"></p>
                </div>title=Example Title</td>
            <td><div class="form-group">
                <p><label for="affix">Affix</label>
                <input type="text" name="affix" id="affix" class="form-control input-lg" 
                    placeholder="affix" 
                    value="" 
                    tabindex="1"></p>
                </div>affix=example affix</td>
            <td><div class="form-group">
                <p><label for="descr">Referral</label>
                <input type="text" name="descr" id="descr" class="form-control input-lg" 
                placeholder="description" 
                value="" 
                tabindex="1"></p>
                </div>desc=This is a Project Description example</td>
            <td><div class="form-group">
                <p><label for="submit">Generate</label>
                <input type="submit" name="generate_url" id="generate_url" class="form-control btn btn-success" 
                    value="Generate URL" tabindex="1"></p>
                </div></td>
            </tr>
            </tbody>
            </table>
        </form>
        </article>

<section class="help" style="padding-left: 30px; padding-right: 30px;">
<p>Read about Codeable Task URLs <a href="https://community.codeable.io/t/new-task-creation-url-parameters/2615" title="codeable community blog" 
target="_blank">https://community.codeable.io/t/new-task-creation-url-parameters/2615</a></p>
<pre>
Example Consultation Usage

https://app.codeable.io/tasks/new?project_type=consultation&project_subject=consultation
Other Project Types

Project Type Values:

    customize
    design_and_develop
    fix
    install
    consultation

Project Subject Values:

    plugin
    theme
    site
    ecommerce_site

Examples

Customize an e-commerce site:

- https://app.codeable.io/tasks/new?project_type=customize&project_subject=ecommerce_site

Consultation with everything:

Parameters:

preferredContractor=42701
ref=k8TwB
exactBudget=500
prefix=example prefix
title=Example Title
affix=example affix
desc=This is a Project Description example

Final Link:

https://app.codeable.io/tasks/new?project_type=consultation&project_subject=consultation&preferredContractor=42701&ref=k8TwB&exactBudget=500&prefix=example%20prefix&title=Example%20Title&affix=example%20affix&desc=This%20is%20a%20Project%20Description%20example
</pre>
</section>
     
    </main>
    </div>
    </div>
<?php include( SNIPP_BASE . 'footer.php'); ?>
    
  </body>
</html>