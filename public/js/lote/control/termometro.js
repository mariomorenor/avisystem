function isEmpty(obj)
{
    for(var key in obj)
    {
        if(obj.hasOwnProperty(key)){return false;}
    }
    return true;
}

function Termometro(id, src, size, progressStyle, ratio=1)
{
	this.element = document.getElementById(id);
	this.image = {};
	this.original = {};
	this.progress = {};
	this.progressContainer = null;
	this.progressLabel = null;
	this.size = {};

	this.init = function(src, size, progressStyle, ratio=1){
		size.height *= ratio;
		size.width *= ratio;

		progressStyle.bottom *= ratio;
		progressStyle.height *= ratio;

		this.progress.style = progressStyle;

		this.size.aspectRatio = size.width/size.height;
		this.size.height = size.height;
		this.size.width = size.width;

		this.element.innerHTML = "";

		this.image.src = src;
		this.image.element = document.createElement('div');
		this.image.element.classList.add('image');
		this.image.element.style.backgroundImage = "url('"+src+"')";

		this.progress.element = document.createElement('div');
		this.progress.element.classList.add('progress');
		this.progress.element.style.height = '0%';
		this.progress.element.style.bottom = (100*this.progress.style.bottom/this.size.height)+'%';
		this.progress.maxHeight = this.progress.style.height;
		this.progress.value = 0;

		this.progressContainer = document.createElement('div');
		this.progressContainer.classList.add('progress-container');
		this.progressContainer.style.height = this.size.height+'px';
		this.progressContainer.style.width = this.size.width+'px';

		this.progressLabel = document.createElement('label');
		this.progressLabel.innerHTML = '0%';
		this.progressLabel.style.fontSize = parseInt(this.size.height/8)+'px';

		this.progressContainer.appendChild(this.progress.element);
		this.progressContainer.appendChild(this.image.element);
		this.progressContainer.appendChild(this.progressLabel);
		this.element.appendChild(this.progressContainer);

		if(isEmpty(this.original))
		{
			this.original.src = src;
			this.original.size = Object.assign({}, size);
			this.original.progressStyle = Object.assign({}, progressStyle);
		}
	};

	this.resize = function(ratio){
		if(ratio>=0 && ratio<=1)
		{
			var value = this.progress.value;

			this.init(this.original.src, Object.assign({},this.original.size), Object.assign({},this.original.progressStyle), ratio);
			
			this.value(value);
			
			return true;
		}
		return false;
	};

	this.value = function(value){
		if(value>=10 && value<=50)
		{
			this.progress.value = value	+20;

			var height = this.progress.maxHeight*this.progress.value/this.size.height;
			if (value > 41 ) {
				this.progress.element.style.height = (height*1.4)+'%';
			}else if (value >= 37 && value <=41) {
				this.progress.element.style.height = (height)+'%';
			}
			else if (value < 37) {
				this.progress.element.style.height = (height*0.6)+'%';
			}
			
			// console.log(height)
			// console.log(this.progress.element.style.height)
			if( value<36){background = '#0063ff';}
			else if(value>36 && value<=41){background = '#37dd24';}
			else if(value>41 && value<=50){background = '#ff0000';}
			
			this.progress.element.style.backgroundColor = background;
			
			this.progressLabel.innerHTML = this.progress.value+'%';

			return true;
		}
		return false;
	};

	this.init(src, size, progressStyle, ratio);
}