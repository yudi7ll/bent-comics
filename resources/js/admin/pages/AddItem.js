import React from 'react';

const AddItem = () => {
    const onSubmitHandler = e => {
        const file = new FormData();
        debugger;
    }

    return (
        <>
        <div className="col-md-6">
            <form
                onSubmit={ onSubmitHandler }
            >
              <div className="form-group">
                <label htmlFor="title">Title</label>
                <input type="text" className="form-control" id="title" placeholder="Ex: Spiderman" required />
              </div>
              <div className="form-group">
                <label htmlFor="author">Author</label>
                <input type="text" className="form-control" id="author" placeholder="Ex: John Doe" required />
              </div>
              <div className="form-group">
                <label htmlFor="publisher">Publisher</label>
                <input type="text" className="form-control" id="publisher" placeholder="Ex: PT. Sun" required />
              </div>
              <div className="form-group">
                <label htmlFor="description">Description</label>
                <textarea className="form-control" rows="10" id="description" placeholder="Synopsis of the Story minimum 50 characters" required></textarea>
              </div>
              <div class="form-group">
                <label for="cover">Cover Image</label>
                <input type="file" id="cover" required/>
                <p class="help-block">Max file size: 20mb</p>
              </div>
              <div className="form-group">
                <label htmlFor="rent_price">Rent Price</label>
                <select
                    name="rent_price"
                    id="rent_price"
                    className="form-control"
                    style={{
                        maxWidth: '8rem'
                    }}
                >
                    <option value="1">$1</option>
                    <option value="5">$5</option>
                    <option value="7">$7</option>
                    <option value="8">$8</option>
                    <option value="10">$10</option>
                </select>
              </div>
              <button type="submit" className="btn btn-info">
                  <i className="fa fa-plus"></i>&nbsp;
                  Add New
              </button>
            </form>
        </div>
        </>
    );
}

export default AddItem;
