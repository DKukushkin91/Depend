//создание елемента из template
export const createElement = (element, fragment) => element.appendChild(fragment);

//удаление всех дочерних элементов
export const removeChilds = (parent) => {
  while (parent.firstChild) {
    parent.removeChild(parent.firstChild);
  }
}
