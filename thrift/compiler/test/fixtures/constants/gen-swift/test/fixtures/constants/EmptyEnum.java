/**
 * Autogenerated by Thrift
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */

package test.fixtures.constants;

import com.facebook.swift.codec.*;

@SwiftGenerated
public enum EmptyEnum {
    ;

    private final int value;

    EmptyEnum(int value) {
        this.value = value;
    }

    @ThriftEnumValue
    public int getValue() {
        return value;
    }

    public static EmptyEnum fromInteger(int n) {
        switch (n) {
        default:
            return null;
        }
    }
}
