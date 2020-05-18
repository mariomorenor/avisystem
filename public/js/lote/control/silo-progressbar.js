function isEmpty(obj)
{
    for(var key in obj)
    {
        if(obj.hasOwnProperty(key)){return false;}
    }
    return true;
}

function Silo(id, src, size, progressStyle, ratio=1)
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
		if(value>=0 && value<=100)
		{
			this.progress.value = value;

			var height = this.progress.maxHeight*this.progress.value/this.size.height;
			this.progress.element.style.height = height+'%';

			if(value>=0 && value<=10){background = '#cb0c00';}
			else if(value>10 && value<=30){background = '#cb5300';}
			else if(value>30 && value<=75){background = '#cb9400';}
			else if(value>75 && value<=100){background = '#34cb00';}
			
			this.progress.element.style.backgroundColor = background;
			
			this.progressLabel.innerHTML = this.progress.value+'%';

			return true;
		}
		return false;
	};

	this.init(src, size, progressStyle, ratio);
}