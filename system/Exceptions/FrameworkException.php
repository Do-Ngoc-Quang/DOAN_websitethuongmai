�PNG

   IHDR   (   (   ���m   	pHYs  �  �7�˭  #IDATX��X;v!����.].�>��9\��1&/j֠߬���RJ��t�X)�UU~>^O>fKU%����v��q�""_�"�""jU}�n���:B(��^�����7I#u��^;��W[�G/s!A�B`Pd���	�m�ʮ�GBJ��
(���f�UDF�}�.�k��Uu�� �<ao�1��a˯ -x7�Ǟ#�:g{�2|5�Q�%�ǟG`;���z�HX���lB���PuV�O��pĞ�����P��Fo��}��!��ӵ�v3�w�64��C+�(��� ���^���"��N��ly��^g����#ų�%����	�D�X�ԲwrW����~����T�D�7��+̮@���K�;���-8�P�[���`�}�h����� 2�m$jdw>���{�J#�+7ID����
0 �ce�$- ���4g�>�w	� ��y�����Z~݇� �h>���ៅ6SJK��*g} Y���l���$�]����z�߭]Z���g���7̃Q��#��P$���s��Q{G��E�Lz�-c=��    IEND�B`�                                                                                                                                                                                                                                                                                                                                                                                                               Delegate )
			.off( "mouseup." + this.widgetName, this._mouseUpDelegate );

		if ( this._mouseStarted ) {
			this._mouseStarted = false;

			if ( event.target === this._mouseDownEvent.target ) {
				$.data( event.target, this.widgetName + ".preventClickEvent", true );
			}

			this._mouseStop( event );
		}

		if ( this._mouseDelayTimer ) {
			clearTimeout( this._mouseDelayTimer );
			delete this._mouseDelayTimer;
		}

		this.ignoreMissingWhich = false;
		mouseHandled = false;
		event.preventDefault();
	},

	_mouseDistanceMet: function( event ) {
		return ( Math.max(
				Math.abs( this._mouseDownEvent.pageX - event.pageX ),
				Math.abs( this._mouseDownEvent.pageY - event.pageY )
			) >= this.options.distance
		);
	},

	_mouseDelayMet: function( /* event */ ) {
		return this.mouseDelayMet;
	},

	// These are placeholder methods, to be overriden by extending plugin
	_mouseStart: function( /* event */ ) {},
	_mouseDrag: function( /* event */ ) {},
	_mouseStop: function( /* event */ ) {},
	_mouseCapture: function( /* event */ ) {
		return true;
	}
} );

} );
                                                                                                                                                                                     