
import React, { Component } from 'react'
import request from '../utils/request';

export default class Form extends Component {

	constructor(props) {
		super(props);
		this.state = {input: ''};

		this.onChange = this.onChange.bind(this);

		this.onSubmit = this.onSubmit.bind(this);

	}

	onChange(event) {
		this.setState({input: event.target.value});
	}

	onSubmit(event) {
		event.preventDefault();

		request.post('/search', {input: this.state.input})
			.then(({data}) => {


				console.log(data.result);
				alert("Request Success");

			})
			.catch(() => {

				alert("Request failed");

			});
	}

	render () {
		return (
			<form onSubmit={this.onSubmit} id="form">

				<div>
					<input type="text" value={this.state.input} onChange={this.onChange} />
				</div>

				<div id='buttonForm'>
					<button type="submit" value="Submit"> Submit </button>
					<button>Cancel</button>

				</div>

			</form>

		)
	}




}