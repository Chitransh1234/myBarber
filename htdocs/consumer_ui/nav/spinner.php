<style>

.container {
    display: flex;
    justify-content: center;
    align-items: center;
	position: relative;
	height: 50px;
	width: 120px;
    border: 2px solid #000;
}

.container .next {
	position: absolute;
	top: 50%;
	right: 30px;
	display: block;
	width: 12px;
	height:12px;
	border-top: 2px solid #000;
	border-left: 2px solid #000;
	z-index: 1;
	transform: translateY(-50%) rotate(135deg);
	cursor: pointer;
	transition: 0.5s;
}

.container .next {
    opacity:1;
	right: 20px;
}

.container .prev {
	position: absolute;
	top: 50%;
	left: 30px;
	display: block;
	width: 12px;
	height:12px;
	border-top: 2px solid #000;
	border-left: 2px solid #000;
	z-index: 1;
	transform: translateY(-50%) rotate(315deg);
	cursor: pointer;
	transition: 0.5s;
}

.container .prev {
    opacity:1;
    Left: 20px;
}
	
#box span {
	display: block;
	width: 100%;
	height: 100%;
	text-align: center;
	line-height: 46px;
	display: none;
	color: #000;
	font-size: 24px;
	font-weight: 700;
	user-select:none;
}

#box span:nth-child(1) {
    display: initial;
}

</style>

<div class="container">
    <span class="next"onclick="nextNum()"></span>
    <span class="prev" onclick="prevNum()"></span>
    <div id="box"></div>

</div>
<script type="text/javascript">

var numbers = document.getElementById('box');
for(i=0;i<=20;i++){
    var span =document.createElement('span');
    span.textContent=i;
    numbers.appendChild(span);
}
var num = numbers.getElementsByTagName('span');
var index = 0;

function nextNum(){
    if(index != 20) {
        num[index].style.display='none';
        index = (index + 1) % num.length;
        num[index].style.display='initial';
        var spin = index;
        $('#spin').val(spin);
    }
}
function prevNum(){
    if(index != 0) {
        num[index].style.display='none';
        index = (index - 1+  num.length) % num.length;
        num[index].style.display='initial'; 
        var spin = index;
        $('#spin').val(spin);
    }
}

</script>
</body>
</html>
