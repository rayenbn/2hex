export default class TypeColor {

  constructor(title, colorsCount, price = 0) {
    this.title = title;
    this.colorsCount = colorsCount;
    this.pantoneColors = Array(colorsCount).fill(null);
    this.price = price;
  }

}