
import React, { Component } from 'react'
import request from '../utils/request';

export default class Form extends Component {

	constructor(props) {
		super(props);
		this.state = {input: '', totalResults: 0, result: '', isSearchDone: false};

		this.onChange = this.onChange.bind(this);

		this.onSubmit = this.onSubmit.bind(this);

		this.onCancel = this.onCancel.bind(this);

	}

	onChange(event) {
		this.setState({input: event.target.value});
	}

	onSubmit(event) {
		event.preventDefault();

		request.post('/search', {input: this.state.input})
			.then(({data}) => {

				const totalResults = data.result.length;

				const joinedResults = data.result.join(',');


				this.setState({isSearchDone: true, totalResults: totalResults, result: joinedResults})

			})
			.catch(() => {

				alert("Request failed");

			});
	}

	onCancel(event) {

		event.preventDefault();

		this.setState({input: '', isSearchDone: false})
	}

	render () {

		const {totalResults, result, isSearchDone, input} = this.state;

		return (
			<form onSubmit={this.onSubmit} id="form">

				{isSearchDone && <p dusk="p-result">{totalResults} results found: {result}</p>}

				<div>
					<input name='input' type="text" value={input} onChange={this.onChange}
						dusk="input-box"
					/>
				</div>

				<div id='buttonForm'>
					<button type="submit" value="Submit"> Submit </button>
					<button onClick={this.onCancel}>Cancel</button>

				</div>

			</form>

		)
	}




}