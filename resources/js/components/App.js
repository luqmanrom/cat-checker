
import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import CatBox from './CatBox';
const cat = require('../assets/cat.svg')

class App extends Component {
	render () {
		return (
				<div id="parentContainer">

					<img src={cat} width='125'/>
					<CatBox/>
				</div>

	)
	}
}

ReactDOM.render(<App />, document.getElementById('app'));