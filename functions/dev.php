<?php

/**
 * Print stuff formatted
 */

function dump($val)
{
    echo '<br>';
    echo '<pre>';
    print_r($val);
    echo '</pre>';
    echo '<br>';
}

/**
 * Print stuff formatted and die
 */

function dd($val)
{
    dump($val);
    die;
}

function get_dummy_content()
{
    ob_start();
    ?>

    <h2>Headings</h2>

    <h1>Heading 1</h1>
    <h2>Heading 2</h2>
    <h3>Heading 3</h3>
    <h4>Heading 4</h4>
    <h5>Heading 5</h5>
    <h6>Heading 6</h6>

    <h2>Paragraphs</h2>

    This is an unwrapped paragraph (no <code>&lt;p&gt;</code> tags) and coming up in just a few words is a line break (no <code>&lt;br&gt;</code> tag)
    and the paragraph continues on this line.

    This is also an unwrapped paragraph.

    <p>This is a wrapped paragraph and coming up in just a few words is a line break<br>
    and the paragraph continues on this line.</p>

    <p>And this is a another wrapped paragraph.</p>

    <p style="text-align: left;">This is a paragraph with left alignment.</p>
    <p style="text-align: center;">This is a paragraph with center alignment.</p>
    <p style="text-align: right;">This is a paragraph with right alignment.</p>
    <p style="text-align: justify;">This is a paragraph with justify alignment.</p>

    <h2>Blockquote</h2>

    <blockquote>
        <p>A block quotation (also known as a long quotation or extract) is a quotation in a written document, that is set off from the main text as a paragraph, or block of text.</p>
        <p>It is typically distinguished visually using indentation and a different typeface or smaller size quotation. It may or may not include a citation, usually placed at the bottom.</p>
        <cite><a href="#!">Said no one, ever.</a></cite>
    </blockquote>

    <h2>Lists</h2>

    <h3>Definition list</h3>

    <dl>
        <dt>Definition List Title</dt>
        <dd>This is a definition list division.</dd>
    </dl>

    <h3>Ordered list</h3>

    <ol>
        <li>List Item 1</li>
        <li>List Item 2</li>
        <li>List Item 3</li>
    </ol>

    <h3>Unordered list</h3>

    <ul>
        <li>List Item 1</li>
        <li>List Item 2</li>
        <li>List Item 3</li>
    </ul>

    <h2>Horizontal rules</h2>

    <hr>

    <h2>Tabular data</h2>

    <table>
        <caption>Table Caption</caption>

        <thead>
            <tr>
                <th>Table Heading 1</th>
                <th>Table Heading 2</th>
                <th>Table Heading 3</th>
                <th>Table Heading 4</th>
                <th>Table Heading 5</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th>Table Footer 1</th>
                <th>Table Footer 2</th>
                <th>Table Footer 3</th>
                <th>Table Footer 4</th>
                <th>Table Footer 5</th>
            </tr>
        </tfoot>

        <tbody>
            <tr>
                <td>Table Cell 1</td>
                <td>Table Cell 2</td>
                <td>Table Cell 3</td>
                <td>Table Cell 4</td>
                <td>Table Cell 5</td>
            </tr>

            <tr>
                <td>Table Cell 1</td>
                <td>Table Cell 2</td>
                <td>Table Cell 3</td>
                <td>Table Cell 4</td>
                <td>Table Cell 5</td>
            </tr>

            <tr>
                <td>Table Cell 1</td>
                <td>Table Cell 2</td>
                <td>Table Cell 3</td>
                <td>Table Cell 4</td>
                <td>Table Cell 5</td>
            </tr>

            <tr>
                <td>Table Cell 1</td>
                <td>Table Cell 2</td>
                <td>Table Cell 3</td>
                <td>Table Cell 4</td>
                <td>Table Cell 5</td>
            </tr>
        </tbody>
    </table>

    <h2>Code</h2>

    <p><strong>Keyboard input:</strong> <kbd>Cmd</kbd></p>
    <p><strong>Inline code:</strong> <code>&lt;div&gt;code&lt;/div&gt;</code></p>
    <p><strong>Sample output:</strong> <samp>This is sample output from a computer program.</samp></p>

    <h2>Pre-formatted text</h2>

    <pre>
        P R E F O R M A T T E D T E X T
        ! " # $ % &amp; ' ( ) * + , - . / \
        0 1 2 3 4 5 6 7 8 9 : ; &lt; = &gt; ?
        @ A B C D E F G H I J K L M N O
        P Q R S T U V W X Y Z [ \ ] ^ _
        ` a b c d e f g h i j k l m n o
        p q r s t u v w x y z { | } ~ &
    </pre>

    <h2>Inline elements</h2>

    <p><a href="#!">This is a text link</a>.</p>
    <p><strong>Strong is used to indicate strong importance.</strong></p>
    <p><em>This text has added emphasis.</em></p>
    <p>The <b>b element</b> is stylistically different text from normal text, without any special importance.</p>
    <p>The <i>i element</i> is text that is offset from the normal text.</p>
    <p>The <u>u element</u> is text with an unarticulated, though explicitly rendered, non-textual annotation.</p>
    <p><del>This text is deleted</del> and <ins>This text is inserted</ins>.</p>
    <p><s>This text has a strikethrough</s>.</p>
    <p>Superscript<sup>®</sup>.</p>
    <p>Subscript for things like H<sub>2</sub>O.</p>
    <p><small>This small text is small for for fine print, etc.</small></p>
    <p>Abbreviation: <abbr title="HyperText Markup Language">HTML</abbr></p>
    <p><q cite="https://developer.mozilla.org/en-US/docs/HTML/Element/q">This text is a short inline quotation.</q></p>
    <p><cite>This is a citation.</cite></p>
    <p>The <dfn>dfn element</dfn> indicates a definition.</p>
    <p>The <mark>mark element</mark> indicates a highlight.</p>
    <p>The <var>variable element</var>, such as <var>x</var> = <var>y</var>.</p>
    <p>The time element: <time datetime="2013-04-06T12:32+00:00">2 weeks ago</time></p>

    <h2>Embedded content</h2>

    <h3>Images</h3>

    <h4>No <code>&lt;figure&gt;</code> element</h4>

    <p><img src="http://placekitten.com/480/480" alt="Image alt text"></p>

    <h4>Wrapped in a <code>&lt;figure&gt;</code> element, no <code>&lt;figcaption&gt;</code></h4>

    <figure><img src="http://placekitten.com/420/420" alt="Image alt text"></figure>

    <h4>Wrapped in a <code>&lt;figure&gt;</code> element, with a <code>&lt;figcaption&gt;</code></h4>

    <figure>
        <img src="http://placekitten.com/420/420" alt="Image alt text">
        <figcaption>Here is a caption for this image.</figcaption>
    </figure>

    <h3>Audio</h3>

    <audio controls="">audio</audio>

    <h3>Video</h3>

    <video controls="">video</video>

    <h3>Canvas</h3>

    <canvas>canvas</canvas>

    <h3>Meter</h3>

    <meter value="2" min="0" max="10">2 out of 10</meter>

    <h3>Progress</h3>

    <progress>progress</progress>

    <h3>Inline SVG</h3>

    <svg width="100px" height="100px"><circle cx="100" cy="100" r="100" fill="#1fa3ec"></circle></svg>

    <h3>IFrame</h3>

    <iframe src="index.php" height="300"></iframe>

    <h2>Form elements</h2>

    <form>
        <fieldset>
            <legend>Input fields</legend>

            <p>
                <label for="input-text">Text Input</label>
                <input id="input-text" type="text" placeholder="Text Input">
            </p>

            <p>
                <label for="input-password">Password</label>
                <input id="input-password" type="password" placeholder="Type your Password">
            </p>

            <p>
                <label for="input-webaddress">Web Address</label>
                <input id="input-webaddress" type="url" placeholder="http://yoursite.com">
            </p>

            <p>
                <label for="input-emailaddress">Email Address</label>
                <input id="input-emailaddress" type="email" placeholder="name@email.com">
            </p>

            <p>
                <label for="input-phone">Phone Number</label>
                <input id="input-phone" type="tel" placeholder="(999) 999-9999">
            </p>

            <p>
                <label for="input-search">Search</label>
                <input id="input-search" type="search" placeholder="Enter Search Term">
            </p>

            <p>
                <label for="input-text2">Number Input</label>
                <input id="input-text2" type="number" placeholder="Enter a Number">
            </p>

            <p>
                <label for="input-text3">Error</label>
                <input id="input-text3" type="text" placeholder="Text Input">
            </p>

            <p>
                <label for="input-text4">Valid</label>
                <input id="input-text4" type="text" placeholder="Text Input">
            </p>
        </fieldset>

        <fieldset>
            <legend>Select menus</legend>

            <p>
                <label for="select">Select</label>

                <select id="select">
                    <optgroup label="Option Group">
                        <option>Option One</option>
                        <option>Option Two</option>
                        <option>Option Three</option>
                    </optgroup>
                </select>
            </p>
        </fieldset>

        <fieldset>
            <legend>Checkboxes</legend>

            <ul>
                <li><label for="checkbox1"><input id="checkbox1" name="checkbox" type="checkbox" checked="checked"> Choice A</label></li>
                <li><label for="checkbox2"><input id="checkbox2" name="checkbox" type="checkbox"> Choice B</label></li>
                <li><label for="checkbox3"><input id="checkbox3" name="checkbox" type="checkbox"> Choice C</label></li>
            </ul>
        </fieldset>

        <fieldset>
            <legend>Radio buttons</legend>

            <ul>
                <li><label for="radio1"><input id="radio1" name="radio" type="radio" checked="checked"> Option 1</label></li>
                <li><label for="radio2"><input id="radio2" name="radio" type="radio"> Option 2</label></li>
                <li><label for="radio3"><input id="radio3" name="radio" type="radio"> Option 3</label></li>
            </ul>
        </fieldset>

        <fieldset>
            <legend>Textareas</legend>

            <p>
                <label for="textarea">Textarea</label>
                <textarea id="textarea" rows="8" cols="48" placeholder="Enter your message here"></textarea>
            </p>
        </fieldset>

        <fieldset>
            <legend>HTML5 inputs</legend>

            <p>
                <label for="ic">Color input</label>
                <input type="color" id="ic" value="#000000">
            </p>

            <p>
                <label for="in">Number input</label>
                <input type="number" id="in" min="0" max="10" value="5">
            </p>

            <p>
                <label for="ir">Range input</label>
                <input type="range" id="ir" value="10">
            </p>

            <p>
                <label for="idd">Date input</label>
                <input type="date" id="idd" value="1970-01-01">
            </p>

            <p>
                <label for="idm">Month input</label>
                <input type="month" id="idm" value="1970-01">
            </p>

            <p>
                <label for="idw">Week input</label>
                <input type="week" id="idw" value="1970-W01">
            </p>

            <p>
                <label for="idt">Datetime input</label>
                <input type="datetime" id="idt" value="1970-01-01T00:00:00Z">
            </p>

            <p>
                <label for="idtl">Datetime-local input</label>
                <input type="datetime-local" id="idtl" value="1970-01-01T00:00">
            </p>
        </fieldset>

        <fieldset>
            <legend>Action buttons</legend>

            <p>
                <input type="submit" value="<input type=submit>">
                <input type="button" value="<input type=button>">
                <input type="reset" value="<input type=reset>">
                <input type="submit" value="<input disabled>" disabled>
            </p>

            <p>
                <button type="submit">&lt;button type=submit&gt;</button>
                <button type="button">&lt;button type=button&gt;</button>
                <button type="reset">&lt;button type=reset&gt;</button>
                <button type="button" disabled>&lt;button disabled&gt;</button>
            </p>
        </fieldset>
    </form>

    <p>Based on <a href="https://github.com/cbracco/html5-test-page" target="_blank">HTML5 Test Page</a> by <strong>cbracco</strong>.</p>

    <?php
    return ob_get_clean();
}