export default class TypeColor {

  constructor(id = 0, name, colorsCount, price = 0) {
    this.id = id;
    this.name = name;
    this.colorsCount = colorsCount;
    this.pantoneColors = Array(colorsCount).fill(null);
    this.price = price;
  }

}