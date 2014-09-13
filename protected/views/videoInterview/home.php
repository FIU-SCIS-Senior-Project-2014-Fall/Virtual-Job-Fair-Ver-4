<style>
    #participants video { width: 10em; }
    .hidden { display:none; }
	table{width:100%;}
	button {
	    background: #0370ea;
		background: -moz-linear-gradient(top,#008dfd 0,#0370ea 100%);
		background: -webkit-linear-gradient(top,#008dfd 0,#0370ea 100%);
		border: 1px solid #076bd2;
		-moz-border-radius: 3px;
		border-radius: 3px;
		color: #fff !important;
		display: inline-block;
		line-height: 1.3;
		padding: 8px 25px;
		text-align: center;
		text-shadow: 1px 1px 1px #076bd2;
		-webkit-transition: none;
		-moz-transition: none;
	    font-size: 1.5em;
	}
	button:hover { background: rgb(9, 147, 240); }
	button:active { background: rgb(10, 118, 190); }
	input { font-size: 2em; }
	.join{font-size: .8em;margin-left: 2em;padding: .2em .6em;}
</style>
<div style="margin-top:100px;">
<table class="visible">
    <tr>
        <td style="text-align: right;">
            <input type="text" id="conference-name" placeholder="Conference Name">
        </td>
        <td>
            <button id="start-conferencing">Start video-conferencing</button>
        </td>
    </tr>
</table>

<table class="visible">
	<tr>
		<td>
			<div id="rooms-list"></div>
		</td>
	</tr>
</table>
<table>
    <tr>
        <td>
            <div id="participants"></div>
        </td>
    </tr>
</table>
</div>
<script src="https://bit.ly/socket-io"></script>
<script src="https://bit.ly/RTCPeerConnection-v1-4"></script>
<script src="http://srprog-fall13-01.cs.fiu.edu/JobFair/themes/bootstrap/css/videocss/conference.js"> </script>
<script src="http://srprog-fall13-01.cs.fiu.edu/JobFair/themes/bootstrap/css/videocss/conference-ui.js"></script>
