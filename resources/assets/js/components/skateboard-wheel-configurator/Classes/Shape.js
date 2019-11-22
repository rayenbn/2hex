class Shape {

	constructor(id, name, slug, sizes = [], isCustom = false) {
	  this.id = id;
	  this.name = name;
	  this.slug = slug;
	  this.sizes = sizes;
	  this.activeSize = null;
	  this.isCustom = isCustom;
	}

	setActiveSize(size) {
		this.activeSize = size;
	}
}

export default Shape;